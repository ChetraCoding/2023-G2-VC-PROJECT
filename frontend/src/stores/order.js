import { defineStore } from "pinia";
import http from "../http-common";

export const useOrderStore = defineStore("order", {
    state: () => {
        return {
            error: null,
            success: false,
            orders: [],
            notPaidOrders:[],
        };
    },
    actions: {
        // Store Order 
        async storeOrder(order) {
            try {
                const res = await http.post('orders', order);
                if (res.data.success) return res.data.data;
            } catch (err) {
                return err;
            }
        },
        // Get orders not complete
        async getOrdersNotCompleted() {
            try {
                const res = await http.get('orders/completed/0');
                if (res.data.success) {
                    this.orders = res.data.data;
                }
            } catch (err) { return err; }
        },
        // Update order to complete
        async updateOrdersToCompleted(orderId,order) {
            try {
                const res = await http.put(`orders/${orderId}`, order);
                if (res.data.success) {
                    this.orders = res.data.data;
                    this.getOrdersNotCompleted();
                    this.success = true;
                }
            } catch (err) {return err;}
        },
        // Get order for cashier
        async getOrder(){
            try{
                const res =  await http.get('orders/paid/0');
                if(res.data.success){
                    this.notPaidOrders = res.data.data
                }
            }catch(err){
                return err;
            }
        }

    },
});