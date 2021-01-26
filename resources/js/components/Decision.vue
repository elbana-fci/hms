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

	    <div v-if="editing" class="row justify-content-center">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header">
	                    <div class="d-flex align-items-center">
	                        <h2>Add Penalties</h2>
	                        <div class="ml-auto">
	                            <a href="" class="btn btn-outline-secondary">Back to all Employee</a>
	                        </div>
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
	                            <button type="submit" class="btn btn-outline-primary btn-lg">Add Penalty</button>
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
	                        <div class="ml-auto">
	                            <a href="" class="btn btn-outline-secondary">Back to all Employee</a>
	                        </div>
	                    </div>
	                </div>

	                <div class="card-body">
	                    <form @submit.prevent="addEmployee" method="post">
	                        <div class="form-group">
	                            <label for="employee-name">Name</label>
	                            <input type="text" name="name" id="employee-name" v-model="name" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <button type="submit" class="btn btn-outline-primary btn-lg">Add Employee</button>
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
	props: ['decision_id'],

	methods: {
		addDecision () {
			axios.post(`/decisions`, {
				decision_number: this.decision_number,
				judgement_number: this.judgement_number,
				decision_date: this.decision_date,
				issuing_authority: this.decision.issuing_authority
			})
			.catch(error => {
				this.$toast.error(error.response.data.message, "Error");
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
			});

			this.addEmp = true;
		},

		addEmployee () {
			axios.post(`/employees`, {
				name: this.name,
				degree: 'First',
				title: 'test',
				penalty: 0
			})
			.catch(error => {
				this.$toast.error(error.response.data.message, "Error");
			})
			.then(({data}) => {
				this.$toast.success(data.message, 'Success');
				this.name = '';
			})
		}
	},

	data () {
		return {
			decision: {
				issuing_authority: ''
			},
			editing: false,
			addEmp: false,
			issuing_authority: ['Hospital','Government', 'Department']
		}
	},

	computed: {

	}
}
</script>