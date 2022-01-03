Vue.component('product', {
    props: {
        premium: {
            type: Boolean,
            required: true
        }
    },
    template: `
    <div class="product">
            <div class="product-image">
                <img v-bind:src="image">
            </div>
            <div class="product-info">
                <!-- <h2>{{pname}}</h2> -->
                <h2>{{titlename}}</h2>
                <p v-if="stock">In Stock</p>
                <p v-else>Out of Stock!</p>
                <p>Shipping : {{shipping}}</p>
                <ul>
                    <li v-for="detail in details">{{detail}}</li>
                </ul>
                <div class="typecolors">
                    <div v-for="(type,index) in types"
                        :key="type.typeid"
                        class="type-box"
                        :style="{backgroundColor:type.typecolor}"
                        @mouseover="updateimage(index)">
                    <!-- <p @mouseover="updateimage(type.typeimage)">{{type.typecolor}}</p> -->
                    </div>
                </div>
                <div class="addtocart">
                    <button v-on:click="addtocart" :disabled="!stock">Add to Cart</button> 
                </div>
            </div>
            <div class="P-review">
                <product-review @reviewsubmit="addreview"></product-review>
            </div>
            <div class="S-review">
                <h1>Reviews</h1>
                <p v-if="!reviews.length">No Reviews...</p>
                <ul>
                    <li v-for="review in reviews">
                    <p>Name : {{review.uname}}</p>
                    <p>Rating : {{review.rating}}</p>
                    <p>Review : {{review.review}}</p>
                    </li>
                </ul>
            </div>
        </div>
    `,
    data() {
        return {
            pname: 'T-Shirt',
            brand: 'New',
            selectedtype: 0,
            details: ["Cottan", "Three Colors", "Made in India"],
            types: [
                {
                    typeid: 1,
                    typecolor: 'Pink',
                    typeimage: './t-shirt.svg',
                    typequantity: 10
                },
                {
                    typeid: 2,
                    typecolor: 'Orange',
                    typeimage: './t-shirt1.svg',
                    typequantity: 15
                },
                {
                    typeid: 3,
                    typecolor: 'blue',
                    typeimage: './t-shirt2.svg',
                    typequantity: 0
                }
            ],
            reviews: []
        }
    },
    methods: {
        addtocart() {
            this.$emit('add-to-cart', this.types[this.selectedtype].typeid)
        },
        updateimage(index) {
            this.selectedtype = index
            // console.log(index)
        },
        addreview(productreview) {
            this.reviews.push(productreview)
        }
    },
    computed: {
        titlename() {
            return this.brand + ' ' + this.pname
        },
        image() {
            return this.types[this.selectedtype].typeimage
        },
        stock() {
            return this.types[this.selectedtype].typequantity
        },
        shipping() {
            if (this.premium) {
                return "Free"
            }
            return "0.99$"
        }
    }
})


Vue.component('product-review', {
    template: `
    <form class="review-form" @submit.prevent="onsubmit">

    <h1>Review Product</h1>

    <p>
        <label for="uname">Name:</label>
        <input id="uname" v-model="uname" required>
    </p>

    <p>
        <label for="review">Review:</label>
        <input id="review" v-model="review" required>
    </p>

    <p>
        <label for="rating">Rating:</label>
        <select id="rating" v-model.number="rating" required>
            <option>5</option>
            <option>4</option>
            <option>3</option>
            <option>2</option>
            <option>1</option>
        </select>
    </p>

    <p>
        <input type="submit"  class="subbtn" value="Submit">
    </p>

    </form>
    `,
    data() {
        return {
            uname: null,
            review: null,
            rating: null
        }
    },
    methods: {
        onsubmit() {
            let productreview = {
                uname: this.uname,
                review: this.review,
                rating: this.rating
            }
            this.$emit('reviewsubmit', productreview)
            uname: null
            review: null
            rating: null
        }
    }
})


var app = new Vue({
    el: '#app',
    data: {
        premium: true,
        item: []
    },
    methods: {
        Updatecart(id) {
            this.item.push(id)
        }
    }
})