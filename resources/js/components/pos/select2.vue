<template>
  <select class="form-control" :name="name">
    <slot></slot>
  </select>
</template>
<!-- <style src="select2/dist/css/select2.min.css"></style> -->
<!-- <style src="select2-bootstrap-theme/dist/select2-bootstrap.min.css"></style> -->
<script>
import select2 from 'select2'
import $ from 'jquery'
export default {
  props: ['options', 'value', 'name'],
  mounted: function () {
    var vm = this
    $(this.$el)
    // init select2
    .select2({ data: this.options })
    .val(this.value)
    // .trigger('change')
    // emit event on change.
    .on('change', function () {
      vm.$emit('input', this.value)
console.log(this.value)

            // if (this.value != "") {
            //     axios
            //         .get("/api/product_code/" + this.value)
            //         .then(({ data }) => {
            //             //    console.log(data[0].id)
            //             if (data == 0) {
            //                 Notification.not_found();
            //                 this.pos = "";
            //             } else {



            //     axios
            //     .get("/api/addToCart/" + data[0].id)
            //     // .then(({data}) => (console.log(data)))
            //     .then(({ data }) => {
            //         //   console.log(data);
            //         if (data == 0) {
            //             Notification.Out_of_stock();
            //             this.qt = data;
            //             Reload.$emit("afterAddToCart");
            //         } else {
            //             this.qt = data;
            //             Reload.$emit("afterAddToCart");
            //             Notification.cart_success();
            //         }
            //         this.pos = "";
            //     })
            //     .catch();




            //             }
            //         })
            //         .catch(console.log("error"));
            //     // this.$refs.focusMe.focus();
            // }




    })
  },

  watch: {
    value: function (value) {
      // update value
      $(this.$el).val(value).trigger('change');
    },
    options: function (options) {
      // update options
      $(this.$el).select2({ data: options })
    }
  },
  destroyed: function () {
    $(this.$el).off().select2('destroy')
  }
}
</script>
