<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">INPUT OVERTIMES EMPLOYEES</div>
                    <hr>
                    <form v-on:submit.prevent="submitForm">
                      Select Calculation Method : <select v-model="form.id">
                            <option disabled value="">Please select one</option>
                            <option v-for="referensi in reff" :key="referensi.id" :value="referensi.id">{{referensi.name }}</option>
                        </select>
                        <button type="submit">View Calculation</button>
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
                    <hr>
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
                id:  '',
            },
        }
    },
    created: function () {
        this.getEmployees()
        this.getOvertimes()
        this.getReff()
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
        getReff: function () {
            axios.get('http://127.0.0.1:8000/api/references')
                .then(res => {
                    this.reff = res.data;
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
            alert('sorry , unfinish')
        },
    }
}
</script>
