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


<!-- <a :href="'/custom/invoice/'+pramid" target="_blank" class="btn btn-sm btn-primary">Print</a> -->

          <div class="row mb-3">
            <!-- Table 1 -->
            <div class="col-xl-12 col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0 font-weight-bold text-primary">Invoice Details</h5>
                </div>
                <div class="card-body">
                	<div class="table-responsive">
                		<ul class="list-group">
                            <li class="list-group-item"><b>Name : </b>{{ orders.customer_name }}</li>
                            <!-- <li class="list-group-item"><b>Phone : </b>{{ orders.phone }}</li> -->
                            <li class="list-group-item"><b>Address : </b>{{ orders.address }}</li>
                            <li class="list-group-item"><b>Date : </b>{{ orders.date }}</li>
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
                                    <th>নাম</th>
                                    <th>ওজন/পরিমাণ</th>
                                    <th>ইউনিট দাম</th>
                                    <th>মোট দাম</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in JSON.parse(orders.Invoices)" :key="details.id">
                                    <td>{{ product.name }}</td>
                                    <td>{{ product.weight_quantity }}</td>
                                    <td>{{ product.price }}</td>
                                    <td>{{ (product.weight_quantity*product.price) }}</td>

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
            orders: {
                Invoices:JSON.stringify([]),
                address:"",
                created_at:"",
                customer_name:"",
                date:"",
                id:null,
                total_amount:"",
                type:"",
                updated_at:"",

            },
            details: {},
			duepaymets: {},
			errors: {},
            previousDue:0,
            pramid:'',
		}
	},

    mounted(){
        let id = this.$route.params.id;
        this.pramid = id;
        axios.get(`/api/invoice?filter[id]=${id}`)
            .then(({data}) => (this.orders = data[0]))
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
