// Auth Components

// let register = require('./components/auth/register.vue').default;
// let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;

let home = require('./components/home.vue').default;

// Employee Components
let storeEmployee = require('./components/employee/create.vue').default;
let employee = require('./components/employee/index.vue').default;
let editEmployee = require('./components/employee/edit.vue').default;

// Supplier Components
let storeSupplier = require('./components/supplier/create.vue').default;
let supplier = require('./components/supplier/index.vue').default;
let editSupplier = require('./components/supplier/edit.vue').default;

// Category Components
let storeCategory = require('./components/category/create.vue').default;
let category = require('./components/category/index.vue').default;
let editCategory = require('./components/category/edit.vue').default;

// Product Components
let storeProduct = require('./components/product/create.vue').default;
let product = require('./components/product/index.vue').default;
let product_expired = require('./components/product/product_expired.vue').default;
let editProduct = require('./components/product/edit.vue').default;

// Expense Components
let storeExpense = require('./components/expense/create.vue').default;
let expense = require('./components/expense/index.vue').default;
let editExpense = require('./components/expense/edit.vue').default;

// Custpmer Components
let storeCustomer = require('./components/customer/create.vue').default;
let customer = require('./components/customer/index.vue').default;
let editCustomer = require('./components/customer/edit.vue').default;
let customerdue = require('./components/customer/customerdue.vue').default;

// Expense Components
let salary = require('./components/salary/all_employee.vue').default;
let paySalary = require('./components/salary/paySalary.vue').default;
let allSalary = require('./components/salary/index.vue').default;
let viewSalary = require('./components/salary/view.vue').default;
let editSalary = require('./components/salary/edit.vue').default;

// Stock Components
let stock = require('./components/product/stock.vue').default;
let available = require('./components/product/available.vue').default;
let editStock = require('./components/product/editStock.vue').default;

//POS Components
let pos = require('./components/pos/pointOfSale.vue').default;

//Order Components
let allOrders = require('./components/order/allOrders.vue').default;
let todayOrders = require('./components/order/order.vue').default;
let thisMonthOrders = require('./components/order/thisMonthOrders.vue').default;
let thisYearOrders = require('./components/order/thisYearOrders.vue').default;
let orderDetails = require('./components/order/orderDetails.vue').default;
let orderPay = require('./components/order/orderPay.vue').default;


let Invoice_buy = require('./components/pos/Invoice_buy.vue').default;
let Invoice_sell = require('./components/pos/Invoice_sell.vue').default;
let Invoice = require('./components/pos/invoice.vue').default;
let InvoiceDetails = require('./components/pos/InvoiceDetails.vue').default;

export const routes = [

  //Auth Routes
//   { path: '/', component: login, name:'/' },
//   { path: '/register', component: register, name:'register' },
//   { path: '/forget', component: forget, name:'forget' },
  { path: '/logout', component: logout, name:'logout' },

  { path: '/home', component: home, name:'home' },


  { path: '/invoices/list/buy', component: Invoice_buy, name:'Invoice_buy' },
  { path: '/invoices/list/sell', component: Invoice_sell, name:'Invoice_sell' },
  { path: '/invoice', component: Invoice, name:'Invoice' },
  { path: '/invoices/:id', component: InvoiceDetails, name:'InvoiceDetails' },



  // Employee Routes
  { path: '/store-employee', component: storeEmployee, name:'storeEmployee' },
  { path: '/employee', component: employee, name:'employee' },
  { path: '/edit-employee/:id', component: editEmployee, name:'editEmployee' },

  // Supplier Routes
  { path: '/store-supplier', component: storeSupplier, name:'storeSupplier' },
  { path: '/supplier', component: supplier, name:'supplier' },
  { path: '/edit-supplier/:id', component: editSupplier, name:'editSupplier' },

  // Category Routes
  { path: '/store-category', component: storeCategory, name:'storeCategory' },
  { path: '/category', component: category, name:'category' },
  { path: '/edit-category/:id', component: editCategory, name:'editCategory' },

  // Product Routes
  { path: '/store-product', component: storeProduct, name:'storeProduct' },
  { path: '/product', component: product, name:'product' },
  { path: '/product/expired', component: product_expired, name:'product_expired' },
  { path: '/edit-product/:id', component: editProduct, name:'editProduct' },

  // Expense Routes
  { path: '/store-expense', component: storeExpense, name:'storeExpense' },
  { path: '/expense', component: expense, name:'expense' },
  { path: '/edit-expense/:id', component: editExpense, name:'editExpense' },

  // Customer Routes
  { path: '/store-customer', component: storeCustomer, name:'storeCustomer' },
  { path: '/customer', component: customer, name:'customer' },
  { path: '/edit-customer/:id', component: editCustomer, name:'editCustomer' },
  { path: '/customer/due/:id', component: customerdue, name:'customerdue' },

  // Expense Routes
  { path: '/given-salary', component: salary, name:'given-salary' },
  { path: '/pay-salary/:id', component: paySalary, name:'paySalary' },
  { path: '/salary', component: allSalary, name:'allSalary' },
  { path: '/view-salary/:month', component: viewSalary, name:'viewSalary' },
  { path: '/edit-salary/:id', component: editSalary, name:'editSalary' },

  // Stock Routes
  { path: '/stock/outofstock', component: stock, name:'stock' },
  { path: '/stock/available', component: available, name:'available' },

  { path: '/stock/:id', component: editStock, name:'editStock' },

  //POS Routes
  { path: '/pos', component: pos, name:'pos' },

  //Order Routes
  { path: '/all-orders', component: allOrders, name:'allOrders' },
  { path: '/today-orders', component: todayOrders, name:'todayOrders' },
  { path: '/this-month-orders', component: thisMonthOrders, name:'thisMonthOrders' },
  { path: '/this-year-orders', component: thisYearOrders, name:'thisYearOrders' },
  { path: '/order-details/:id', component: orderDetails, name:'orderDetails' },
  { path: '/order-pay/:id', component: orderPay, name:'orderPay' },


]
