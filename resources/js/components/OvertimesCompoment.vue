<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">INPUT OVERTIMES EMPLOYEES</div>
                    <hr>
                    <form v-on:submit.prevent="submitForm">
                       Select Employee : <select v-model="form.employee_id">
                            <option disabled value="">Please select one</option>
                            <option v-for="employee in employees" :key="employee.id" :value="employee.id">{{ employee.name }}</option>
                        </select>
                       
                        <br>
                       Pick Overtime Date : <input type="date" v-model="form.date" ><br>
                       Pick Start Time : <input type="time" v-model="form.time_started"><br>
                       Pick End Time :   <input type="time" v-model="form.time_ended"><br>
                        <button type="submit">Save Data</button>
                    </form>
                    <hr>
                    <table>
                            <tr>
                                <th>No</th>
                                <th>Empoyee ID</th>
                                <th>Date</th>
                                <th>Time Start</th>
                                <th>Time End</th>
                            </tr>
                            <tr v-for="overtime,index in overtimes">
                                <td>{{ index+1 }}</td>
                                <td>{{ overtime.employee_id }}</td>
                                <td> {{ overtime.date }}</td>
                                <td> {{ overtime.time_started }}</td>
                                <td> {{ overtime.time_ended }}</td>
                                
                            </tr>
                        </table>
                        
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            employees: [],
            overtimes:[],
            reff:[],
            form: {
                employee_id:  '',
                date: '',
                time_started: '',
                time_ended: '',
            },
        }
    },
    created: function () {
        this.getEmployees()
        this.getOvertimes()
       
    },
    methods: {
        getEmployees: function () {
            axios.get('http://127.0.0.1:8000/api/empolyees')
                .then(res => {
                    this.employees = res.data;
                })
                .catch(err => {
                    console.log(err);
                })
        },
        getOvertimes: function () {
            axios.get('http://127.0.0.1:8000/api/overtimes')
                .then(res => {
                    this.overtimes = res.data;
                })
                .catch(err => {
                    console.log(err);
                })
        },
        submitForm() {
            console.log(this.form)
             axios.post('http://127.0.0.1:8000/api/overtime', this.form)
                 .then((res) => {
                    var response=JSON.stringify(res.data);
                    alert(response)
                    this.getOvertimes()
                 })
                 .catch((error) => {
                    var response=JSON.stringify(error);
                    alert(response)
                }).finally(() => {
                });
        },
    }
}
</script>
