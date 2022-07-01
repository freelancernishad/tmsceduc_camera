<template>
	<div>
		<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>


<a :href="'/invoice/'+pramid" target="_blank" class="btn btn-sm btn-primary">Print</a>

          <div class="row mb-3">
            <!-- Table 1 -->
            <div class="col-xl-6 col-lg-6">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0 font-weight-bold text-primary">Order Details</h5>
                </div>
                <div class="card-body">
                	<div class="table-responsive">
                		<ul class="list-group">
                            <li class="list-group-item"><b>Order Id : </b>{{ orders.orderId }}</li>
                            <li class="list-group-item"><b>Name : </b>{{ orders.name }}</li>
                            <li class="list-group-item"><b>Phone : </b>{{ orders.phone }}</li>
                            <li class="list-group-item"><b>Address : </b>{{ orders.address }}</li>
                            <li class="list-group-item"><b>Date : </b>{{ orders.order_date }}</li>
                            <li class="list-group-item"><b>Pay Through : </b>{{ orders.payBy }}</li>
                      </ul>
                  </div>
                </div>
              </div>
            </div>

            <!-- Table 2 -->
            <div class="col-xl-6 col-lg-6">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0 font-weight-bold text-primary">Order Details</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">



                        <ul class="list-group" v-if="duepaymets==0">
                            <li class="list-group-item"><b>Sub Total : </b>{{ orders.sub_total }}৳</li>
                            <li class="list-group-item"><b>Pay Amount : </b>{{ orders.pay }}৳</li>
                            <li class="list-group-item"><b>Due Amount : </b>{{ orders.due }}৳</li>
                      </ul>


                        <ul class="list-group" v-else>
                            <li class="list-group-item"><b>Sub Total : </b>{{ orders.sub_total }}৳</li>
                            <li class="list-group-item"><b>{{ orders.order_date }} : </b>{{ orders.pay-previousDue }}৳</li>
                            <li class="list-group-item" v-for="duepaymet in duepaymets"><b>{{ duepaymet.pay_date }} : </b>{{ duepaymet.payment_amount }}৳</li>
                            <li class="list-group-item"><b>Total Pay Amount : </b>{{ orders.pay }}৳</li>
                            <li class="list-group-item"><b>Due Amount : </b>{{ orders.due }}৳</li>
                      </ul>



                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <!-- Table 3 -->
            <div class="col-xl-12 col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0 font-weight-bold text-primary">Ordered Products</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Code</th>
                                    <!-- <th>Image</th> -->
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr v-for="product in details" :key="product.id">
                                    <td>{{ product.product_name }}</td>
                                    <td>{{ product.product_code }}</td>
                                    <!-- <td><img :src="'/'+product.image" id="image_size"></td> -->
                                    <td>{{ product.product_quantity }}</td>
                                    <td>{{ product.product_price }}<span class="money">৳</span></td>
                                    <td>{{ product.sub_total }}<span class="money">৳</span></td>
                                </tr>



                                <tr v-for="custom_product in customdetails" :key="custom_product.id">
                                    <td>{{ custom_product.product_name }}</td>
                                    <td>{{ custom_product.product_code }}</td>
                                    <!-- <td><img :src="'/'+product.image" id="image_size"></td> -->
                                    <td>{{ custom_product.product_quantity }} {{ custom_product.product_quantity_type }}</td>
                                    <td>{{ custom_product.product_price }}<span class="money">৳</span></td>
                                    <td>{{ custom_product.sub_total }}<span class="money">৳</span></td>
                                </tr>




                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

        </div>
	</div>
</template>

<script>
export default {

	created(){
		if (!User.loggedIn()) {
			this.$router.push({name: '/'})
		}
	},

	data () {
		return {
            orders: {},
            details: {},
            customdetails: {},
			duepaymets: {},
			errors: {},
            previousDue:0,
            pramid:'',
		}
	},

    mounted(){
        let id = this.$route.params.id;
        this.pramid = id;
        axios.get('/api/orders/' + id)
            .then(({data}) => (this.orders = data))
            .catch(console.log('error'))

        axios.get('/api/order/details/' + id)
            .then(({data}) => (this.details = data))
            .catch(console.log('error'))

        axios.get('/api/customorder/details/' + id)
            .then(({data}) => (this.customdetails = data))
            .catch(console.log('error'))

        axios.get('/api/order/duepay/' + id)
            .then(({data}) => {

                this.duepaymets = data;
                 this.duepaymets.forEach(element => {
                    console.log(element)
                    this.previousDue += Number(element.payment_amount)
                 });

            })
            .catch(console.log('error'))

    },

	computed: {
		// filtersearch(){
		// 	return this.products.filter(product => {
		// 		return product.product_name.match(this.searchTerm)
		// 	})
		// }
	},

	methods: {

	}
}
</script>

<style lang="css" scoped>
#image_size{
	height: 100px;
	width: 135px;
}
</style>
