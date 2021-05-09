<template>
	<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card employee-add" v-if="this.$parent.addForm">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>أضف موظف</h2>
                    </div>
                </div>
                <div class="card-body">
                    <form @submit.prevent="addEmployee" method="post">
                    	<div class="form-row">
	                        <div class="form-group">
	                            <label for="employee-name">الاسم</label>
	                            <input type="text" name="name" id="employee-name" v-model="name" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="employee-title">الوظيفة</label>
	                            <select name="title" id="employee-title" v-model="emp.title" class="form-control">
		                           <option v-for="title in titles">{{ title }}</option>
		                        </select>
	                        </div>
	                        <div class="form-group">
	                            <label for="employee-degree">الدرجة</label>
	                            <select name="degree" id="employee-degree" v-model="emp.degree" class="form-control">
		                           <option v-for="degree in degrees">{{ degree }}</option>
		                        </select>
	                        </div>
	                        <div class="form-group">
	                            <button type="submit" class="btn btn-primary dark-blue btn-lg">أضف موظف</button>
	                            <button type="button" class="btn btn-primary dark-blue btn-lg">إلغاء</button>
	                        </div>
                    	</div>
                    </form>
                </div>
            </div>
            <div class="card employee-add" v-if="this.$parent.editForm">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>تعديل موظف</h2>
                    </div>
                </div>
                <div class="card-body">
                    <form @submit.prevent="editEmployee" method="post">
                    	<div class="form-row">
	                        <div class="form-group">
	                            <label for="employee-name">الاسم</label>
	                            <input type="text" name="name" id="employee-name" v-model="employee.name" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="employee-title">الوظيفة</label>
	                            <select name="title" id="employee-title" v-model="employee.title" class="form-control">
		                           <option v-for="title in titles">{{ title }}</option>
		                        </select>
	                        </div>
	                        <div class="form-group">
	                            <label for="employee-degree">الدرجة</label>
	                            <select name="degree" id="employee-degree" v-model="employee.degree" class="form-control">
		                           <option v-for="degree in degrees">{{ degree }}</option>
		                        </select>
	                        </div>
	                        <div class="form-group">
	                            <button type="submit" class="btn btn-primary dark-blue btn-lg">تعديل موظف</button>
	                            <button type="button" class="btn btn-primary dark-blue btn-lg">إلغاء</button>
	                        </div>
                    	</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{

	props: ['addForm', 'employee'],

	data(){
		return{
			name: '',
			emp: {
				title: '',
				degree: ''
			},
			titles: ['صيدلي','طبيب بشري','طبيب أسنان','ممارس علاج طبيعي','ممرضة','أخصائي تمريض','فني أشعة','فني معمل','فني احصاء','موظف'],
			degrees: ['أولى','ثانية', 'ثالثة', 'رابعة', 'خامسة']
		}
	},

	methods: {
		addEmployee () {
			axios.post(`/employees`, {
				name: this.name,
				title: this.emp.title,
				degree: this.emp.degree
			})
			.then(res => {
				this.$toast.success(res.data.message, "Success", { timeout: 3000 });
				this.show = false;
			}).catch(err => {
				this.$toast.error(err.response.data.message, "Error", { timeout: 3000 });
			});

		},

		editEmployee () {
			axios.put(`/employees/${this.employee.id}`, {
	    		name: this.employee.name,
	    		title: this.employee.title,
	    		degree: this.employee.degree
	    	}).then(res => {
				this.$toast.success(res.data.message, "Success", { timeout: 3000 });
			}).catch(err => {
				this.$toast.error(err.response.data.message, "Error", { timeout: 3000 });
			});
		}
	}
}
</script>