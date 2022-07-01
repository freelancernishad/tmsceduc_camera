<template>
	<div class="row justify-content-center">
		<div class="col-xl-12 col-lg-12 col-md-12">
			<div class="card shadow-sm my-5">
				<div class="card-body p-0">
					<div class="row">
						<div class="col-lg-12">

							<div class="login-form">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Due Pay</h1>
								</div>
								<form @submit.prevent='updateCustomer' enctype="multipart/form-data">
									<div class="form-group">
										<div class="form-row">
											<div class="col-md-6">
												<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Total Due Amount" v-model="form.due" readonly>
												<small class="text-danger" v-if="errors.due"> {{ errors.due[0] }} </small>
											</div>
											<div class="col-md-6">
												<input type="number"  class="form-control" id="exampleInputEmail" placeholder="Enter Amount" v-model='form.payamount'>
												<small class="text-danger" v-if="errors.payamount">{{ errors.payamount[0] }}</small>
											</div>
										</div>
									</div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Pay By</label>
                                        <select class="form-control" id="exampleFormControlSelect2" v-model="form.payBy">
                                            <option value="Cheque">Cheque</option>
                                            <option value="Hand Cash">Hand Cash</option>
                                            <option value="Gift Card">Gift Card</option>
                                        </select>
                                    </div>


									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-block">Update</button>
									</div>
								</form>
								<div class="text-center">
								</div>
							</div>
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
			form:{
				due: '',
				payBy: '',
				payamount: '',

			},
            amount:'',

			errors: {
                payamount:'',
            }
		}
	},
	mounted(){
		let id = this.$route.params.id
        axios.get('/api/orders/' + id)
            .then(({data}) => (this.form = data))
            .catch(console.log('error'))
	},
	methods:{

		updateCustomer(){


            var inputAmount =this.form.payamount;
            var dueAmount =this.form.due;

                if(inputAmount>dueAmount){
                 this.errors.payamount = ["Please Enter Under "+dueAmount];
                }else{

                    let id = this.$route.params.id
                    axios.post('/api/due-order/' + id, this.form)
                    .then(({data}) => {
                          this.$router.push({name: 'customerdue', params: {id: data}})
                         Notification.success()
                    })
                    .catch(error => this.errors = error.response.data.errors)
                }

		},



	}
}
</script>

<style lang="css" scoped>
</style>
