<template>
	<div class="row justify-content-center">
		<div class="col-xl-12 col-lg-12 col-md-12">
			<div class="row">
				<div class="col-lg-12 mb-4">
					<!-- Simple Tables -->
					<div class="card">
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h2 class="m-0 font-weight-bold text-primary">Invoice Buy List</h2>
							<input type="text" placeholder="Search By Phone" v-model="searchTerm" class="form-control" style="width: 300px;">
						</div>
						<div class="table-responsive">
							<table class="table align-items-center table-flush">
								<thead class="thead-light">
									<tr>
										<th>Name</th>
										<th>Address</th>
										<th>Total Amount</th>
										<th>Date</th>
										<th>Type</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="order in orders" :key="order.id">
										<td>{{ order.customer_name }}</td>
										<td>{{ order.address }}</td>
										<td>{{ order.total_amount }}</td>
										<td>{{ order.date }}</td>
										<td>{{ order.type }}</td>
										<td>
											<router-link :to="{name: 'InvoiceDetails', params: {id: order.id}}" class="btn btn-sm btn-primary">View</router-link>
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
			orders: [],
			searchTerm:""
		}
	},
	computed: {
		// filtersearch(){
		// 	return this.orders.filter(order => {
		// 		return order.customer_name.match(this.searchTerm)
		// 	})
		// }
	},
	methods: {
		allOrder(){
			axios.get(`/api/invoice?filter[type]=কেনা`)
			.then(({data}) => (this.orders = data))
			.catch()
		}
	},
	mounted(){
		this.allOrder();
	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
