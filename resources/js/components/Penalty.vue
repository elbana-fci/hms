<template>
	<div>
	    
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
	                            <label for="issuing-authority">Decision #</label>
	                            <select name="issuing_authority" id="issuing-authority" v-model="decision.id" class="form-control">
	                            	<option v-for="decision in decisions">{{ decision.id }}</option>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label for="employee-n">Employee Name</label>
	                            <select name="employee-n" id="employee-n" v-model="selected" multiple="" class="form-control">
	                            	<option v-for="employee in employees" v-bind:value="employee.id">{{ employee.name }}</option>
	                            </select>
	                            <h5>{{ selected }}</h5>
	                        </div>
	                        <div class="form-group">
	                            <label for="employee-name">Penalty</label>
	                            <input type="text" name="penalty" id="employee-name" v-model="penalty" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="employee-name">Reason</label>
	                            <input type="text" name="penalty_reason" id="employee-name" v-model="penalty_reason" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <button type="submit" class="btn btn-outline-primary btn-lg">Add Penalty</button>
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
		fetchDecisions (endpoint) {
			axios.get(endpoint)
			.then(res => 
				this.decisions.push(...res.data)
			);
			},

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
				decision_id: this.decision.id,
				empIDs: this.selected
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
			penalty: null,
			penalty_reason: null,
			decision: {
				issuing_authority: '',
				id: ''
			},
			editing: false,
			addEmp: true,
			issuing_authority: ['Hospital','Government','Department'],
			decisions: [],
			employees: [],
			selected: [],
			options: [
		      { text: 'One', value: 'A' },
		      { text: 'Two', value: 'B' },
		      { text: 'Three', value: 'C' }
		    ]

		}
	},

	created () {
		this.fetch(`/getAllEmployees`);
		this.fetchDecisions(`/getAllDecisions`);
		this.empIDs = [1,2];
	},

	computed: {

	}
}
</script>