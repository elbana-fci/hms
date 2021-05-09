<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 penalties">
            <h2></h2>
            <table class="table table-bordered table-dir">
                <thead>
                    <tr>
                        <th scope="col">م</th>
                        <th scope="col">رقم القضية</th>
                        <th scope="col">رقم القرار</th>
                        <th scope="col">تاريخ القرار</th>
                        <th scope="col">اسم المخالف</th>
                        <th scope="col">الوظيفة</th>
                        <th scope="col">سبب الجزاء</th>
                        <th scope="col">الجزاء الموقع</th>
                        <th scope="col">تاريخ التنفيذ</th>
                        <th scope="col">جهة الاصدار</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(penalty, index) in penalties.data" :penalty="penalty" :key="penalty.id">
                        <th scope="row">{{ index+1 }}</th>
                        <td>{{ penalty.judgement_number }}</td>
                        <td>{{ penalty.decision_number }}</td>
                        <td>{{ penalty.decision_date }}</td>
                        <td>{{ penalty.name }}</td>
                        <td>{{ penalty.title }}</td>
                        <td>{{ penalty.penalty_reason }}</td>
                        <td>{{ penalty.penalty }}</td>
                        <td v-if="penalty.execution_date">
                            {{ penalty.execution_date }}      
                        </td>
                        <td v-else><a @click="prepareModal(penalty)">لم ينفذ بعد</a></td>
                        <td>{{ penalty.issuing_authority }}</td>
                    </tr>
                </tbody>
            </table>
            <pagination :data="penalties" @pagination-change-page="getResults"></pagination>        
        </div>
    </div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">{{ this.modalData.penalty }}</h5>
	        <p>{{ this.modalData.penalty_reason }}</p>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        {{ this.modalData.name }}
	        <form @submit.prevent="setExecutionDate" method="post">
            	<div class="form-row">
                    <div class="form-group">
                        <label for="decision-date">تاريخ القرار</label>
                        <input type="date" min="0" max="4294967295" name="decision_date" required id="decision-date" v-model="execution_date" class="form-control">
                    </div>
                </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save changes</button>
			      </div>
		    </form>
	      </div>
	    </div>
	  </div>
	</div>

</div>
</template>
<script>
export default {

	data() {
		return{
			laravelData: {},
			penalties: [],
			dec_id: '',
			pen_id: '',
			emp_id: '',
			modalData: Object,
			execution_date: ''
		}
	},

	mounted() {
        // Fetch initial results
        this.getResults();
    },

	methods: {
		fetch (endpoint) {
			axios.get(endpoint)
			.then(res => {
				this.penalties.push(...res.data);
        	});
		},

		getResults(page = 1) {
            axios.get('/PenaltyRecords?page=' + page)
                .then(response => {
                    this.penalties = response.data;
                });
        },

        prepareModal(penalty){
        	$('#exampleModal').modal('show');
        	this.modalData = penalty;
        },

        setExecutionDate(){
        	let decision_id = this.modalData.dec_id;
        	let penalty_id = this.modalData.pen_id;
    		let employee_id = this.modalData.emp_id;
    		let execution_date = this.execution_date; 
			axios.patch(`/setExecutionDate/${this.modalData.emp_id}`, {decision_id: this.modalData.dec_id, penalty_id: this.modalData.pen_id, employee_id: this.modalData.emp_id, execution_date: this.execution_date})
    		.then(res => {
    			this.$toast.success(res.data.message, "Success", { timeout: 3000 });
			}).catch(err => {
				this.$toast.error(err.response.data.message, "Error", { timeout: 3000 });
			});
	    },
	},
	
}
</script>