<template>
	<div class="decision-edit">
	    <div v-if="!editing" class="row justify-content-center">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header">
	                    <div class="d-flex align-items-center">
	                        <h2>تعديل قرار</h2>
	                    </div>
	                </div>

	                <div class="card-body">
	                    <form @submit.prevent="update" method="post">
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
	                            <label for="decisionContent" class="item-dir">صياغة القرار</label>
	                            <textarea type="text" name="decision_content" required id="decisionContent" v-model="decision_content" class="form-control ckeditor"></textarea>
	                        </div>
	                        <div class="form-group">
	                            <button type="submit" class="btn btn-primary dark-blue">تعديل القرار</button>
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
	                        <h2>تعديل جزاء</h2>
	                        <button @click="reset()" class="btn btn-primary dark-blue mr-auto">أضف جزاء</button>
	                    </div>
	                </div>

	                <div class="card-body">

	                	<form v-if="addPen" @submit.prevent="addPenalty" method="post">
	                        <div class="form-group">
	                            <label for="p-n">الجزاءات</label>
	                            <select name="p-n" id="p-n" v-model="penalty" class="form-control">
	                            	<option v-for="p in penalt" v-bind:value="p.id">{{ p.penalty }}</option>
	                            </select>
	                            <h5>{{ penalty }}</h5>
	                        </div>
	                        <div class="form-group">
	                            <label for="employee-n">الموظفين</label>
	                            <select name="employee-n" id="employee-n" v-model="selected" multiple="" class="form-control">
	                            	<option v-for="employee in employees" v-bind:value="employee.id">{{ employee.name }}</option>
	                            </select>
	                            <h5>{{ selected }}</h5>
	                        </div>
	                        <div class="form-group">
	                            <button v-if="!penalty_id" type="submit" :disabled="!decision_id" class="btn btn-primary dark-blue">أضف جزاء</button>
	                            <button v-if="penalty_id" type="submit" :disabled="!decision_id" class="btn btn-primary dark-blue">أضف جزاء آخر</button>
	                            <button v-if="!penalty_id" type="submit" :disabled="!decision_id" class="btn btn-danger dark-blue">انتهى</button>
	                        </div>
	                    </form>


	                    <li v-for="(items, index) in penalties" class="pens-list">
	                    	<div class="card">
	                    		<div class="card-header">
			                    	<div class="d-flex align-items-center">
								  		<h5>{{ index }} ({{ items[0].penalty }})</h5>
								  		
								  		<div class="mr-auto">
		                    				<button @click="toggle(index)" class="btn btn-sm btn-primary">تعديل</button>
		                    				<button class="btn btn-sm btn-danger">حذف</button>
		                				</div>
		                    		</div>
	                    		</div>
		                    	<div v-if="show === index && edit" class="card-body">
								  <ul v-for="item in items" :item="item">
								  	<li>{{item.name}}
								  		<button @click="destroy(item.emp_id)" class="btn"><i class="fas fa-trash"></i></button>
								  	</li>
								  </ul>
								</div>
						  </div>
						</li>
<!--
	                	<ul v-for="(pen, index) in penalties" class="pens-list">	
                    		<ul v-for="item in pen">
                    			<li>
                    				<div class="d-flex align-items-center">
	                    				<h5>{{item.penalty}}</h5>
	                    				<div class="mr-auto">
		                    				<button @click="toggle(item)" class="btn btn-sm btn-primary">تعديل</button>
		                    				<button class="btn btn-sm btn-danger">حذف</button>
	                    				</div>
                    				</div>
                    				<form v-if="show === item.id && edit" @submit.prevent="updatePenalty" method="post">
				                        <div class="form-group">
				                            <label for="employee-n">الموظفين</label>
				                            <select name="employee-n" id="employee-n" v-model="selected" multiple="" class="form-control">
				                            	<option v-for="employee in employees" v-bind:value="employee.id">{{ employee.name }}</option>
				                            </select>
				                            <h5>{{ selected }}</h5>
				                        </div>
				                        <div class="form-group">
				                            <button type="submit" :disabled="!id" class="btn btn-primary">تعديل جزاء</button>
				                            <button type="submit" :disabled="!id" class="btn btn-danger">انتهى</button>
				                        </div>
				                    </form>
                    			</li>
                    		</ul>
                    	</ul>
                    -->
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</template>
<script>
export default {
	props: ['decision_id', 'penalty_id', 'employee_id', 'empIDs', 'decision', 'emp_id'],

	methods: {

		fetch (endpoint) {
			axios.get(endpoint)
			.then(res => {
				this.employees.push(...res.data);
				CKEDITOR.instances.decisionContent.setData(this.decision.decision_content);	
        });
			
		},

		fetchP (endpoint) {
			axios.get(endpoint)
			.then(res => {
				this.penalt.push(...res.data);	
        });
			
		},

		fetchPens (endpoint) {
			axios.get(endpoint)
			.then(res => {
				//this.penalties.push(res.data.penalties);
				this.penalties = _.groupBy(res.data.penalties, "penalty_id");
        });

		},

		addDecision () {
			axios.post(`/decisions`, {
				decision_number: this.decision_number,
				judgement_number: this.judgement_number,
				decision_date: this.decision_date,
				issuing_authority: this.decision.issuing_authority,
				decision_content: CKEDITOR.instances.decisionContent.getData()
			})
			.then(res => {
				this.decision_id = res.data.decision['id'];
				this.$toast.success(res.data.message, "Success", { timeout: 3000 });
				this.editing = true;
			}).catch(err => {
				this.$toast.error(err.response.data.message, "Error", { timeout: 3000 });
			});

		},

		addPenalty () {
			axios.post(`/penalties`, {
				penalty: this.penalty,
				user_id: 1,
				decision_id: this.decision_id,
				empIDs: this.selected
			})
			.then(res => {
				this.$toast.success(res.data.message, "Success", { timeout: 3000 });
			}).catch(err => {
				this.$toast.error(err.response.data.message, "Error", { timeout: 3000 });
			});
		},

		toggle: function(index) {
	      if (this.show === index){
	      	this.show = false;
	      }else{
	      	this.addPen = false;
	      	this.edit = true;
	      	this.show = index;
	      	this.penalty_id = index;
	      }
	    },

	    reset: function() {
			this.penalty = '';
			this.penalty_reason = '';
			this.addPen = true;
			this.edit = false;
	    },

	    editPenalty () {
	    	this.beforeEditCache = {
	    		penalty: this.penalty,
	    		penalty_reason: this.penalty_reason
	    	}
	    },

	    cancel () {
	    	this.penalty = this.beforeEditCache.penalty;
	    	this.penalty_reason = this.beforeEditCache.penalty_reason;
	    },

	    updatePenalty () {
	    	axios.put(`/penalties/${this.penalty_id}`, {
	    		penalty: this.penalty_id,
	    		decision_id: this.id,
	    		empIDs: this.selected
	    	}).then(res => {
	    		this.penalty = res.data.penalty;
				this.$toast.success(res.data.message, "Success", { timeout: 3000 });
			}).catch(err => {
				this.$toast.error(err.response.data.message, "Error", { timeout: 3000 });
			});
	    },

	    edit(){
	    	this.beforeEditCache = {

	    	};
	    },

	    update(){
	    	axios.put(`/decisions/${this.id}`, {
	    		decision_number: this.decision.decision_number,
				judgement_number: this.decision.judgement_number,
				decision_date: this.decision.decision_date,
				issuing_authority: this.decision.issuing_authority,
				decision_content: CKEDITOR.instances.decisionContent.getData()
	    	})
	    	.then(res => {
				this.$toast.success(res.data.message, "Success", { timeout: 3000 });
			}).catch(err => {
				this.$toast.error(err.response.data.message, "Error", { timeout: 3000 });
			});
	    },

	    destroy(emp_id){
	    	//console.log(this.id, this.penalty_id, emp_id);
	    	if(confirm('Are you sure?')){
	    		this.emp_id = emp_id;
	    		axios.delete(`/deletePenaltyByDecID`, {params: { id: this.id, penalty_id: this.penalty_id, emp_id: this.emp_id }})
	    		.then(res => {
	    			$(this.$el).fadeOut(500, () => {
	    				alert(res.data.message);
	    			})
	    		});
	    	}
	    }
	},

	data () {
		return {
			decision_number: this.decision.decision_number,
			judgement_number: this.decision.judgement_number,
			decision_date: this.decision.decision_date,
			id: this.decision.id,
			beforeEditCache: {},
			decision: {
				issuing_authority: ''
			},
			editing: false,
			edit: false,
			show: false,
			addPen: false,
			issuing_authority: ['المستشفى','الإدارة', 'المديرية'],
			employees: [],
			selected: [],
			penalties: [],
			penalt: []
		}
	},

	created () {
		this.fetch(`/getAllEmployees`);
		this.fetchP(`/getAllPenalties`);
		this.fetchPens(`/getPenaltiesByDecID/${this.id}`);
		this.decision_id = this.id;
	},

	computed: {

		endpoint(){
			return `decisions`;
		}

	}
}
</script>