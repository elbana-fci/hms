<template>
	<div class="row justify-content-center">
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
                    <form @submit.prevent="create" method="post">
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
</template>
<script>
	export default {
		props: ['employee'],

		methods: {
			create () {
				axios.post(`/employees`, {
					name: this.name,
					degree: 'First',
					title: 'test',
					penalty: 0,
					user_id: 1
				})
				.catch (error => {
					this.$toast.error(error.response.data.message, "Error");
				})
			}
		},

		data () {
			return {
				name: ''

			}
		},

		computed: {

		}
	}
</script>