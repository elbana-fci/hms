<template>
	<div>
	    <div v-if="!editing" class="row justify-content-center">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header">
	                    <div class="d-flex align-items-center">
	                        <h2>أضف قرار</h2>
	                    </div>
	                </div>

	                <div class="card-body">
	                    <form @submit.prevent="addDecision" method="post">
	                        <div class="form-group">
	                            <label for="decision-number" class="item-dir">رقم القرار</label>
	                            <input type="number" min="0" max="4294967295" name="decision_number" required id="decision-number" v-model="decision_number" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="judgement-number">رقم القضية</label>
	                            <input type="number" min="0" max="4294967295" name="judgement_number" required id="judgement-number" v-model="judgement_number" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="decision-date">تاريخ القرار</label>
	                            <input type="date" min="0" max="4294967295" name="decision_date" required id="decision-date" v-model="decision_date" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="issuing-authority">جهة الاصدار</label>
	                            <select name="issuing_authority" id="issuing-authority" v-model="decision.issuing_authority" class="form-control">
	                            	<option v-for="authority in issuing_authority">{{ authority }}</option>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <button type="submit" class="btn btn-outline-primary btn-lg">أضف قرار</button>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
		<!-- v-if="editing" -->
	    <div  class="row justify-content-center">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header">
	                    <div class="d-flex align-items-center">
	                        <h2>أضف جزاء</h2>
	                    </div>
	                </div>

	                <div class="card-body">
	                    <form @submit.prevent="addPenalty" method="post">
	                        <div class="form-group">
	                            <label for="employee-n">الموظفين</label>
	                            <select name="employee-n" id="employee-n" v-model="selected" multiple="" class="form-control">
	                            	<option v-for="employee in employees" v-bind:value="employee.id">{{ employee.name }}</option>
	                            </select>
	                            <h5>{{ selected }}</h5>
	                        </div>
	                        <div class="form-group">
	                            <label for="employee-name">الجزاء</label>
	                            <input type="text" name="penalty" id="employee-name" v-model="penalty" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="employee-name">السبب</label>
	                            <input type="text" name="penalty_reason" id="employee-name" v-model="penalty_reason" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <button type="submit" :disabled="!decision_id" class="btn btn-outline-primary btn-lg">أضف جزاء</button>
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
	props: ['decision_id', 'penalty_id', 'employee_id', 'empIDs'],

	methods: {

		fetch (endpoint) {
			axios.get(endpoint)
			.then(res => 
				this.employees.push(...res.data)
			);
		},

		addDecision () {
			axios.post(`/decisions`, {
				decision_number: this.decision_number,
				judgement_number: this.judgement_number,
				decision_date: this.decision_date,
				issuing_authority: this.decision.issuing_authority
			})
			.then(res => {
				this.decision_id = res.data.decision['id'];
				this.$toast.success(res.data.message, "Success", { timeout: 3000 });
			}).catch(err => {
				this.$toast.error(err.response.data.message, "Error", { timeout: 3000 });
			});

			this.editing = true;
		},

		addPenalty () {
			axios.post(`/penalties`, {
				penalty: this.penalty,
				penalty_reason: this.penalty_reason,
				user_id: 1,
				decision_id: this.decision_id,
				empIDs: this.selected
			})
			.then(res => {
				this.$toast.success(res.data.message, "Success", { timeout: 3000 });
			}).catch(err => {
				this.$toast.error(err.response.data.message, "Error", { timeout: 3000 });
			});
		}
	},

	data () {
		return {
			decision: {
				issuing_authority: ''
			},
			editing: false,
			issuing_authority: ['المستشفى','الإدارة', 'المديرية'],
			employees: [],
			selected: [],
			penalties: [],
			reemp: []
		}
	},

	created () {
		this.fetch(`/getAllEmployees`);
	},

	computed: {

	}
}
</script>