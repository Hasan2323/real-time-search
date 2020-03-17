<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Real time search</div>

                    <form action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="search" v-model="search_input" aria-label="search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text" id="basic-addon2">Search</button>
                            </div>
                        </div>
                    </form>

                    <div :style="resultDiv">
                        <ul>
                            <li v-for="search_result in search_results" :key="search_result.id">
                                <a href="">{{ search_result.title }}</a>
                            </li>
                        </ul>
                        <span v-if="!search_results.length" style="color:red;font-size:18px">Results not found</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                search_input: "",
                search_results: "",
                resultDiv:{
                    display: 'block',
                }
            }
        },methods:{
            getData(value){
                var app=this;
                axios.get("/search/"+value)
                    .then(function (response) {
                        app.search_results=response.data;
                    });

            }
        },watch:{
            search_input:function (value) {
                this.getData(value);
                if(this.search_input.length){
                    this.resultDiv.display="block";
                }else {
                    this.search_results="";
                }
            }
        }
    }
</script>
