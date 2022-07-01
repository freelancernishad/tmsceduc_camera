<template>
	<div class="row justify-content-center">
		<div class="col-xl-12 col-lg-12 col-md-12">
			<div class="row">
				<div class="col-lg-12 mb-4">
					<!-- Simple Tables -->
					<div class="card">
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h2 class="m-0 font-weight-bold text-primary">Stock List</h2>
								<input type="text" placeholder="Search By Product Name" v-model="searchTerm" v-on:input="searchData" class="form-control" style="width: 300px;">
		    <router-link to="/store-product" class="btn btn-primary float-right" style="margin-top: 6px;margin-right: 6px;">Add Product</router-link>
						</div>
						<div class="table-responsive">
							<table class="table align-items-center table-flush">
								<thead class="thead-light">
									<tr>
										<th>Product Name</th>
										<th>Product Code</th>
										<!-- <th>Image</th> -->
										<th>Category</th>
										<th>Buying Price</th>
										<th>Status</th>
										<th>Quantity</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="product in products.data" :key="product.id">
										<td>{{ product.product_name }}</td>
										<td>{{ product.product_code }}</td>
										<!-- <td><img :src="product.image" id="img_size"></td> -->
										<td>{{ product.category_name }}</td>
										<td>{{ product.buying_price }}</td>
										<td v-if="product.product_quantity >= 1"><span class="badge badge-success">Available</span></td>
										<td v-else=""><span class="badge badge-danger">Stock Out</span></td>
										<td>{{ product.product_quantity }}</td>
										<td>
											<router-link :to="{name: 'editStock', params: {id: product.id}}" class="btn btn-sm btn-primary">Edit Stock</router-link>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="card-footer">

<pagination :data="products" v-bind:showDisabled="true" icon="chevron" v-on:change-page="allProduct"></pagination>

                        </div>
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
			products: {},
			searchTerm:""
		}
	},
	computed: {
		// filtersearch(){
		// 	return this.products.filter(product => {
		// 		return product.product_name.match(this.searchTerm)
		// 	})
		// }
	},
	methods: {
		allProduct(page){

           if (typeof page === 'undefined') {
				page = 1;
			}




			axios.get(`/api/products/stockcheck?page=${page}&availble=true`)
			.then(({data}) => (this.products = data))
			.catch()
		},



		searchData(page){


            // clear timeout variable
            clearTimeout(this.timeout);

            this.timeout = setTimeout( ()=> {


                if (typeof page === 'undefined') {
                     page = 1;
                 }
                 axios.get('/api/products/stockcheck?filter[product_name]=' + this.searchTerm)
                 .then(({data}) => {

                     this.products = data
                     this.allitems = data
                     //  console.log(this.products)
                 })
                 .catch()

            }, 300);


		},

		deleteProduct(id){
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					axios.delete('/api/product/' + id)
						 .then(() => {

						 	// this.products = this.products.filter(product => {
						 	// 	return product.id != id
						 	// })
						 })
						 .catch(() => {
						 	this.$router.push({name: 'product'})
						 })

					Swal.fire(
						'Deleted!',
						'Your file has been deleted.',
						'success'
						)
				}
			})
		}
	},
	mounted(){
		this.allProduct();
	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
