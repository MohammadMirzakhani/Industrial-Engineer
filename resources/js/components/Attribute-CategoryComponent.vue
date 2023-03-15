<template>
    <div>
    <div class="form-group">
            <label >دسته بندی</label>
            <select class="form-control" name="categories" >
                <option v-for="category in categories" :value="category.id">{{category.name }}</option>
            </select>
            </div>
            <div class="form-group">
               <select class="form-control" name="categories" >
                <option v-for="category in categories" :value="category.id">{{category.name }}</option>
            </select>
            </div>  
            <div class="form-group">
                <label >قیمت</label>
                <input type="number" name="price" placeholder="قیمت محصول" class="form-control">
            </div>
            <div class="form-group">
                <label >قیمت ویژه</label>
                <input type="number" name="discount_price" placeholder="قیمت ویژه محصول" class="form-control">
            </div>
            <div class="form-group">
                <label >توضیحات </label>
                <textarea type="text" name="description" placeholder="توضیحات را وارد کنید ..."  class="form-control"></textarea>
            </div>
            <input type="hidden" name="photo_id" id="brand-photo">
            <div class="form-group">
                <label >تصویر برند</label>
                <input type="file" name="ImageBrand"  class="form-control form-control-lg" >
            </div>
            <div class="form-group">
                <label >عنوان سئو </label>
                <input type="text" name="meta_title" placeholder="عنوان سئو را وارد کنید ..." class="form-control">
            </div>
            <div class="form-group">
                <label >کلمات کلیدی سئو</label>
                <input type="text" name="meta_keyword" placeholder="کلمات کلیدی سئو را وارد کنید ..." class="form-control">
            </div>
            <div class="form-group">
                <label>توضیحات سئو</label>
                <textarea type="text" name="meta_description" placeholder="توضیحات سئو را وارد کنید ..."  class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label></label>
                <input type="submit" value="ذخیره" class="btn btn bg-success">
            </div>
        </div>
    </div>
</template>
<script>
   export default {
        data() {
          return {
            categories: [],
            categories_selected: [],
            flag: false,
            attributes:[],
            selectedAttribute: [],
            computedAttribute: []
          }
        },
        props: ['brands', 'product'],
        mounted() {
            axios.get('api/admin-shop/categories').then(res =>{
                this.getAllChildren(res.data.categories, 0)
            }).catch(err=>{
              console.log (err)
            })
            if(this.product){
              console.log(this.product)
              for(var i=0; i<this.product.categories.length; i++){
                this.categories_selected.push(this.product.categories[i].id)
              }
              for(var i=0; i<this.product.attribute_values.length; i++){
                this.selectedAttribute.push({
                  'index': i,
                  'value': this.product.attribute_values[i].id
                })
                this.computedAttribute.push(this.product.attribute_values[i].id)
              }
              const load = 'ok'
              this.onChange(null, load);
            }
        },
        methods: {
            getAllchildren: function(currentValue, level){
              for(var i=0; i< currentValue.length; i++){
                var current = currentValue[i];
                this.categories.push({
                  id: current.id,
                  name: Array(level + 1).join("----") + " " + current.name
                })
                if(current.children_recursive && current.children_recursive.length > 0){
                  this.getAllchildren(current.children_recursive, level + 1)
                }
              }
            },
            onChange: function(event, load){
              this.flag = false;
              axios.post('/api/categories/attribute', this.categories_selected).then(res =>{
                if(this.product && load == null){
                  this.computedAttribute = []
                  this.selectedAttribute = []
                }
                this.attributes = res.data.attributes
                this.flag = true
              }).catch(err => {
                console.log(err)
                this.flag = false
              })

            },
          addAttribute: function(event, index){
              for(var i=0; i<this.selectedAttribute.length; i++){
                var current = this.selectedAttribute[i];
                if(current.index == index){
                  this.selectedAttribute.splice(i, 1)
                }
              }
              this.selectedAttribute.push({
                'index': index,
                'value': event.target.value
              })
              this.computedAttribute = []
              for(var i=0; i<this.selectedAttribute.length; i++){
                this.computedAttribute.push(this.selectedAttribute[i].value)
              }
            },
        }
    }
    // export default {
    //     data(){
    //      return{
    //       categories: ''
    //      }
    //     },
    //     mounted() {
    //         axios.get('api/admin-shop/categories').then(res=>{
    //         console.log(res);
    //         this.categories=res.data.categories;
    //         }).catch(err=>{
    //          console.log(err)
    //         })
    //     }
    // }
</script>
