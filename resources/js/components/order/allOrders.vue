<template>
  <div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-12">
      <div class="row">
        <div class="col-lg-12 mb-4">
          <!-- Simple Tables -->
          <div class="card">
            <h2
              style="padding: 13px 22px 0 22px"
              class="m-0 font-weight-bold text-primary"
            >
              All Orders
            </h2>
            <div
              class="
                card-header
                py-3
                d-flex
                flex-row
                align-items-center
                justify-content-between
              "
            >
              <select
                v-model="searchYear"
                class="form-control"
                style="width: 300px"
              >
                <option value="">Select</option>
                <option v-for="n in 20">{{ currentYear - n }}</option>
              </select>

              <select
                v-model="searchMonth"
                class="form-control"
                style="width: 300px"
              >
                <option value="">Select</option>
                <option v-for="month in monthname">{{ month }}</option>
              </select>

              <input
                type="text"
                placeholder="Search By Phone"
                v-model="searchTerm"
                class="form-control"
                style="width: 300px"
              />
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                      <th>Order Id</th>
                    <th>Name</th>
                    <th>Total Amount</th>
                    <th>Pay</th>
                    <th>Due</th>
                    <th>Pay By</th>
                    <th>Date</th>
                    <th>Year</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="order in filtersearch" :key="order.id">
                    <td>{{ order.orderId }}</td>
                    <td>{{ order.name }}</td>
                    <td>{{ order.sub_total }}</td>
                    <td>{{ order.pay }}</td>
                    <td>{{ order.due }}</td>
                    <td>{{ order.payBy }}</td>
                    <td>{{ order.order_date }}</td>
                    <td>{{ order.order_year }}</td>
                    <td>
                      <router-link
                        :to="{ name: 'orderDetails', params: { id: order.id } }"
                        class="btn btn-sm btn-primary"
                        >View</router-link
                      >
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
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "/" });
    }
  },

  data() {
    return {
      orders: [],
      searchTerm: "",
      searchYear: "",
      searchMonth: "",
      currentYear: new Date().getFullYear() + 1,
      monthname: [
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
    };
  },
  computed: {
    filtersearch() {
        return this.filterProductsByYear(this.filterProductsByMonth(this.filterProductsByName(this.orders)))
    },
  },
  methods: {

            filterProductsByYear: function(products){
                return products.filter((order) => {
                       return order.order_year.match(this.searchYear);
                 });
            },

            filterProductsByMonth: function(products) {
                return products.filter((order) => {
                    return order.order_month.match(this.searchMonth);
                });
            },


            filterProductsByName: function(products) {
                return products.filter((order) => {
                    return order.name.match(this.searchTerm);
                });
            },





    allOrder() {
      axios
        .get("/api/all-orders")
        .then(({ data }) => (this.orders = data))
        .catch();
    },
  },
  mounted() {
    this.allOrder();
  },
};
</script>

<style lang="css" scoped>
#img_size {
  width: 40px;
}
</style>
