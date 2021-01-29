<template>
	<div>
	    <div v-if="!editing" class="row justify-content-center">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header">
	                    <div class="d-flex align-items-center">
	                        <h2>New Decision</h2>
	                        <div class="ml-auto">
	                            <a href="" class="btn btn-outline-secondary">Back to all Decisions</a>
	                        </div>
	                    </div>
	                </div>

	                <div class="card-body">
	                    <form @submit.prevent="addDecision" method="post">
	                        <div class="form-group">
	                            <label for="decision-number">Decision Number</label>
	                            <input type="number" min="0" max="4294967295" name="decision_number" id="decision-number" v-model="decision_number" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="judgement-number">Judgement Number</label>
	                            <input type="number" min="0" max="4294967295" name="judgement_number" id="judgement-number" v-model="judgement_number" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="decision-date">Decision Date</label>
	                            <input type="date" min="0" max="4294967295" name="decision_date" id="decision-date" v-model="decision_date" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="issuing-authority">Issuing Authority</label>
	                            <select name="issuing_authority" id="issuing-authority" v-model="decision.issuing_authority" class="form-control">
	                            	<option v-for="authority in issuing_authority">{{ authority }}</option>
	                            </select>
	                            <p>issue: {{ decision.issuing_authority }}</p>
	                        </div>
	                        <div class="form-group">
	                            <button type="submit" class="btn btn-outline-primary btn-lg">Create Decision</button>
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
	                        <h2>Add Penalties</h2>
	                    </div>
	                </div>

	                <div class="card-body">
	                    <form @submit.prevent="addPenalty" method="post">
	                        <div class="form-group">
	                            <label for="employee-name">Penalty</label>
	                            <input type="text" name="penalty" id="employee-name" v-model="penalty" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="employee-name">Reason</label>
	                            <input type="text" name="penalty_reason" id="employee-name" v-model="penalty_reason" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <button type="submit" :disabled="!decision_id" class="btn btn-outline-primary btn-lg">Add Penalty</button>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>

	    <div v-if="addEmp" class="row justify-content-center">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header">
	                    <div class="d-flex align-items-center">
	                        <h2>Add Employee</h2>
	                    </div>
	                </div>

	                <div class="card-body">
	                    <form @submit.prevent="" method="post">
	                        <div class="form-group">
	                            <label for="issuing-authority">Name</label>
	                            <select name="issuing_authority" id="issuing-authority" v-model="employees" class="form-control">
	                            	<option v-for="employee in employees">{{ employee.name }}</option>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <button type="submit" :disabled="!penalty_id" class="btn btn-outline-primary btn-lg">Add Employee</button>
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
	props: ['decision_id', 'penalty_id', 'employee_id'],

	methods: {

		fetch (endpoint) {
			axios.get(endpoint)
			.then(({data}) => {
				this.employees.push(...data.data)
			});
			},

		addDecision () {
			axios.post(`/decisions`, {
				decision_number: this.decision_number,
				judgement_number: this.judgement_number,
				decision_date: this.decision_date,
				issuing_authority: this.decision.issuing_authority
			})
			.then(res =>
				this.decision_id = res.data.decision['id']
			);

			this.editing = true;
		},

		addPenalty () {
			axios.post(`/penalties`, {
				penalty: this.penalty,
				penalty_reason: this.penalty_reason,
				user_id: 1,
				decision_id: this.decision_id
			})
			.then(res =>
				this.penalty_id = res.data.penalty['id']
			);

			this.addEmp = true;
		},

		addEmployee () {
			axios.post(`/employees`, {
				name: this.name,
				degree: 'First',
				title: 'test',
				decision_id: this.decision_id
			})
			.then(res =>
				this.employee_id = res.data.employee['id']
			);
		}
	},

	data () {
		return {
			decision: {
				issuing_authority: ''
			},
			editing: false,
			addEmp: true,
			issuing_authority: ['Hospital','Government', 'Department'],
			employees: []
		}
	},

	created () {
		this.fetch(`/employees`);
	},

	computed: {

	}
}
</script>