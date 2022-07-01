<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Dashboard
                </li>
            </ol>
        </div>
        <div class="row mb-3">

            <div class="col-md-12">
                <div class="card">
                    <div class="cord-body">
                        <div class="form-group pl-3">
                            <label for="">Date</label>

                        <input type="date" class="form-control" v-model="date" @change="datechange" style="width:200px">
                         </div>
                    </div>
                </div>

            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Today Sell Amount
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="money">৳</span> {{ todaySells }}
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
                                        3.48%</span>
                                    <span>Since last month</span> -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Today Income
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="money">৳</span> {{ income }}
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>
                                        12%</span>
                                    <span>Since last years</span> -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Today Due
                                </div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <span class="money">৳</span> {{ due }}
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>
                                        20.4%</span>
                                    <span>Since last month</span> -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Expense Amount
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="money">৳</span> {{ expense }}
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <!-- <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i>
                                        1.10%</span>
                                    <span>Since yesterday</span> -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Total Stock
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                     {{ totalStock }}
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <!-- <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i>
                                        1.10%</span>
                                    <span>Since yesterday</span> -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Total Stock Amount
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="money">৳</span> {{ totalStockAmount }}
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <!-- <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i>
                                        1.10%</span>
                                    <span>Since yesterday</span> -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">

                <!-- <vue-select class="vue-select1"  :options="yearsList" :model.sync="result1" >
        </vue-select> -->

                Search :
                <select v-model="year" id="select" @change="monthlybar" class="form-control">
                    <option value="">Select</option>
                    <option v-for="listy in yearsList">{{ listy }}</option>
                </select>
                <Bar :chart-options="chartOptions" :chart-data="chartData" :chart-id="chartId"
                    :dataset-id-key="datasetIdKey" :plugins="plugins" :css-classes="cssClasses" :styles="styles"
                    :width="width" :height="height" />
            </div>

            <div class="col-lg-12 mb-4">
              Search :
                <select v-model="monthname" id="select" @change="dailybar" class="form-control">
                    <option value="">Select</option>
                    <option v-for="(listm, index) in monthlist" :value="index">{{ listm }}</option>
                </select>
                <Bar :chart-options="chartOptions2" :chart-data="chartData2" :chart-id="chartId2"
                    :dataset-id-key="datasetIdKey2" :plugins="plugins2" :css-classes="cssClasses2" :styles="styles2"
                    :width="width2" :height="height2" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2 class="m-0 font-weight-bold text-primary">
                            Stock Out Products
                        </h2>
                        <router-link to="/store-product" class="btn btn-primary float-right"
                            style="margin-top: 6px; margin-right: 6px">Add Product</router-link>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Code</th>

                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in stockOutProducts" :key="product.id">
                                    <td>{{ product.product_name }}</td>
                                    <td>{{ product.product_code }}</td>

                                    <td v-if="product.product_quantity >= 1">
                                        <span class="badge badge-success">Available</span>
                                    </td>
                                    <td v-else="">
                                        <span class="badge badge-danger">Stock Out</span>
                                    </td>
                                    <td>
                                        <router-link :to="{
                                            name: 'editStock',
                                            params: { id: product.id },
                                        }" class="btn btn-sm btn-primary">Edit Stock</router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2 class="m-0 font-weight-bold text-primary">
                            Date Expaired Products
                        </h2>
                        <router-link to="/store-product" class="btn btn-primary float-right"
                            style="margin-top: 6px; margin-right: 6px">Add Product</router-link>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in expiredProducts" :key="product.id">
                                    <td>{{ product.product_name }}</td>
                                    <td>{{ product.product_code }}</td>


                                    <td>
                                        <span class="badge badge-danger">Expired</span>
                                    </td>
                                    <td>
                                       <router-link :to="{name: 'editProduct', params: {id: product.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "home",
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }
    },
    props: {
        chartId: {
            type: String,
            default: "bar-chart",
        },
        datasetIdKey: {
            type: String,
            default: "label",
        },
        width: {
            type: Number,
            default: 400,
        },
        height: {
            type: Number,
            default: 300,
        },
        cssClasses: {
            default: "",
            type: String,
        },
        styles: {
            type: Object,
            default: () => { },
        },
        plugins: {
            type: Object,
            default: () => { },
        },
        chartId2: {
            type: String,
            default: "bar-chart2",
        },
        datasetIdKey2: {
            type: String,
            default: "label2",
        },
        width2: {
            type: Number,
            default: 400,
        },
        height2: {
            type: Number,
            default: 300,
        },
        cssClasses2: {
            default: "",
            type: String,
        },
        styles2: {
            type: Object,
            default: () => { },
        },
        plugins2: {
            type: Object,
            default: () => { },
        },
    },
    data() {
        return {
            todaySells: "",
            income: "",
            due: "",
            expense: "",
            totalStock: "",
            totalStockAmount: "",
            stockOutProducts: {},
            expiredProducts: {},
            newdata: new Date(),
            year: "",
            month: "",
            date: "",
            start: "",
            end: "",
            yeard: "",
            dated: "",
            startd: "",
            endd: "",
            monthname: "",
            yearsList: [],
            monthlist: [],
            chartData: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                ],
                datasets: [],
            },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
            },
            chartData2: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                ],
                datasets: [],
            },
            chartOptions2: {
                responsive: true,
                maintainAspectRatio: false,
            },
            monthdays : ''
        };
    },
    mounted() {
              this.date = User.dateformat()[0];
        this.monthname = this.newdata.getMonth();
this.countmonth();
        this.todaySell();
        this.todayIncome();
        this.todayDue();
        this.expenses();
        this.totalStocks();
        this.totalStockAmounts();
        this.stockOutProduct();


        this.expiredProduct();
        this.monthlybar();
        this.dailybar();
        this.yearslist();
        this.monthslist();
        //   $('#select').select2();

    },
    methods: {
        countmonth(){
         const date = new Date();

        var count =  new Date(
            date.getFullYear(),
            this.monthname + 1,
            0
        ).getDate();
        // console.log(count)
        this.monthdays = count
        },


        datechange(){

            this.todaySell();
            this.todayIncome();
            this.todayDue();
            this.expenses();

        },

        todaySell() {
            axios
                .get(`/api/today/sell?date=${this.date}`)
                .then(({ data }) => (this.todaySells = data))
                .catch();
        },
        todayIncome() {
            axios
                .get(`/api/today/income?date=${this.date}`)
                .then(({ data }) => (this.income = data))
                .catch();
        },
        todayDue() {
            axios
                .get(`/api/today/due?date=${this.date}`)
                .then(({ data }) => (this.due = data))
                .catch();
        },
        expenses() {
            axios
                .get(`/api/total/expense?date=${this.date}`)
                .then(({ data }) => (this.expense = data))
                .catch();
        },

        totalStocks() {
            axios
                .get("/api/total/totalStock")
                .then(({ data }) => (this.totalStock = data))
                .catch();
        },

        totalStockAmounts() {
            axios
                .get("/api/total/totalStockAmount")
                .then(({ data }) => (this.totalStockAmount = data))
                .catch();
        },
        stockOutProduct() {
            axios
                .get("/api/stockout/product")
                .then(({ data }) => (this.stockOutProducts = data))
                .catch();
        },
        expiredProduct() {
            axios
                .get("/api/products/expired")
                .then(({ data }) => (this.expiredProducts = data.data))
                .catch();
        },
        monthlybar() {
            // console.log(this.year=)
            // this.start = this.newdata.getFullYear()+'-'+this.newdata.getMonth()+'-'+this.newdata.getDate();
            this.start = this.newdata.getFullYear() + "-1-1";
            this.end = this.newdata.getFullYear() + "-12-"+this.monthdays;
            if (this.year == "") {
                this.year = this.newdata.getFullYear();
            }
            axios
                .get(
                    "/api/monthly/bar?start=" +
                    this.start +
                    "&end=" +
                    this.end +
                    "&year=" +
                    this.year
                )
                .then(({ data }) => {
                    this.chartData.datasets = [data.reports2, data.reports];
                      console.log(this.chartData.datasets)
                })
                .catch();
        },
        dailybar() {
            var monthd = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

this.countmonth()

            this.startd =
                this.newdata.getFullYear() +
                "-" +
                monthd[this.monthname] +
                "-1";
            this.endd =
                this.newdata.getFullYear() +
                "-" +
                monthd[this.monthname] +
                "-"+this.monthdays;
            this.yeard = this.newdata.getFullYear();
            axios
                .get(
                    "/api/daily/bar?start=" +
                    this.startd +
                    "&end=" +
                    this.endd +
                    "&year=" +
                    this.yeard
                )
                .then(({ data }) => {
                    this.chartData2.datasets = [data.reports];
                    this.chartData2.labels = data.allmonth;
                    //  console.log(this.chartData2.labels);
                    // if(this.monthname==''){

                    //     this.monthname = this.newdata.getMonth();
                    // }
                })
                .catch();
        },

        yearslist() {

            axios
                .get("api/years/list?type=year")
                .then(({ data }) => {
                    // console.log(data);
                    this.yearsList = data;
                })
                .catch();
        },
        monthslist() {

            axios
                .get("api/years/list?type=month")
                .then(({ data }) => {
                    // console.log(data);
                    this.monthlist = data;
                })
                .catch();
        },
    },
};





</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
