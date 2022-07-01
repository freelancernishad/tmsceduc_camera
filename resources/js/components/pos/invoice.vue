<template>
  <div>

    <div class="row w-full mt-4 p-10">


        <div class="col-md-6">
            <div class="form-group">
                <label for="">নাম</label>
                <input type="text" class="form-control" v-model="form.customer_name">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">ঠিকানা</label>
                <input type="text" class="form-control" v-model="form.address">
            </div>
        </div>

        <!-- <div class="col-md-6">
            <div class="form-group">
                <label for="">ধরণ</label>
                <select  v-model="form.type" class="form-control">
                    <option value="">Select</option>
                    <option>কেনা</option>
                    <option>বেচা</option>
                </select>
            </div>
        </div> -->


        <div class="col-md-6">
            <div class="form-group">
                <label for="">তারিখ</label>
                <input type="date" class="form-control" v-model="form.date">
            </div>
        </div>

<div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>নাম</th>
                        <th>ওজন/পরিমাণ</th>
                        <th>ইউনিট দাম</th>
                        <th>মোট দাম</th>
                        <th><button type="button" class="flex justify-start ml-2 rounded-md border px-3 py-2 bg-pink-600 text-white" @click="addMore()">Add More</button></th>
                    </tr>
                </thead>

                <tbody>
                    <tr  v-for="(Invoice, index) in form.Invoices" :key="index">
                        <td><input v-model="Invoice.name" placeholder="প্রোডাক্ট এর নাম" class="form-control w-full py-2 border border-indigo-500 rounded"/></td>
                        <td><input type="number" v-model="Invoice.weight_quantity" placeholder="প্রোডাক্ট এর ওজন/পরিমাণ" class="form-control w-full py-2 border border-indigo-500 rounded" min="0" step="5"/></td>
                        <td><input type="number" v-model="Invoice.price" placeholder="ইউনিট দাম" class="form-control w-full py-2 border border-indigo-500 rounded" min="0" step="5"/></td>
                        <td><input type="number" v-model="Invoice.price*Invoice.weight_quantity" placeholder="মোট দাম" class="form-control w-full py-2 border border-indigo-500 rounded" readonly/></td>

                        <td><button type="button" class="ml-2 rounded-md border px-3 py-2 bg-red-600 text-white" @click="remove(index)" v-show="index != 0">Remove</button></td>
                    </tr>
                </tbody>


            </table>


        </div>

</div>

    <div class="col-md-9"></div>

    <div class="col-md-3" style="display: flex;justify-content: end;">
        <button class="btn btn-success" @click="formsubmit">Create Invoice</button>
    </div>




    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
        form:{
            customer_name:null,
            address:null,
            date:null,
            type:'কেনা',
            Invoices: [
                    {
                    name: "",
                    weight_quantity: "",
                    price: "",
                    },
                ],
        },

    };
  },
  methods: {


    formsubmit(){
        axios.post(`/api/invoice/create`,this.form).then(({data})=>{

                this.$router.push({
                    name: "Invoice_buy"
                });

        }).catch()
    },


    addMore() {
      this.form.Invoices.push({
        name: "",
        weight_quantity: "",
        price: "",
      });
    },
    remove(index) {
      this.form.Invoices.splice(index, 1);
    },

    formatPrice(value) {
        let val = (value/1).toFixed(2).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    }
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.bg-pink-600 {
    --tw-bg-opacity: 1;
    background-color: rgba(219,39,119,var(--tw-bg-opacity));
}
.bg-red-600 {
    --tw-bg-opacity: 1;
    background-color: rgba(220,38,38,var(--tw-bg-opacity));
}

</style>
