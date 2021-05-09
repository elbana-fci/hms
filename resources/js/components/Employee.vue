<template>
<div class="row justify-content-center">
    <div class="col-md-12 employees">
        <div class="top-wrap">
            <h2 class="main-heading">الموظفين</h2>
            <button @click="showAddForm()" class="btn btn-primary dark-blue mr-auto">أضف موظف<i class="fas fa-user-plus"></i></button>
        </div>

        <addemployee :employee="employee"></addemployee>

        <table class="table table-bordered table-dir">
            <thead>
                <tr>
                    <th scope="col">م</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">الوظيفة</th>
                    <th scope="col">الدرجة</th>
                    <th scope="col">تاريخ الإضافة</th>
                    <th scope="col">التحكم</th>
                </tr>
            </thead>
            <tbody>
                
                    <tr v-for="(employee, index) in employees" :key="employee.id">
                        <th scope="row">{{ index+1 }}</th>
                        <td>{{ employee.name }}</td>
                        <td>{{ employee.title }}</td>
                        <td>{{ employee.degree }}</td>
                        <td>{{ employee.created_at }}</td>
                        <td class="control-icons">
                            <a @click="showEditForm(employee)"><i class="fas fa-pen"></i></a>
                            <a href=""><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
            </tbody>
        </table>
        
    </div>
</div>
</template>
<script>
export default{

	data() {
		return{
			employees: [],
			addForm: false,
			editForm: false,
			employee: Object
		}
	},

	methods: {
		fetch (endpoint) {
			axios.get(endpoint)
			.then(res => {
				this.employees.push(...res.data);
        	});
		},
		showAddForm(){
			this.editForm = false;
			this.addForm = true;
		},
		showEditForm(employee){
			this.addForm = false;
			this.editForm = true;
			this.employee = employee;
		}

	},

	created () {
		this.fetch(`/getAllEmployees`);

		Fire.$on('searching', () => {
			let query = this.$parent.search;
    		axios.get('findEmployee?q='+query)
    		.then((data) => {
    			this.employees = data.data;
    		})
    		.catch(() => {

    		})
    	})
	},

}
</script>