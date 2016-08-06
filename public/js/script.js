
var emailRe = /^([\w-_]+(?:\.[\w-_]+)*)@((?:[a-z0-9]+(?:-[a-zA-Z0-9]+)*)+\.[a-z]{2,6})$/i;


var vm = new Vue({

    http: {
        root: '/root',
        headers: {
            'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
        }
    },


    el:'#UserController',

    data:{
      newUser:{
          id:'',
          name:'',
          email:'',
          address:''
      },
        success:false,
        edit:false,
    },

    methods:{
      fetchUser:function () {
          this.$http.get('/api/users').then((response)=>{
              this.$set('users',response.data)
          });
      },
        AddNewUser:function () {

          var user = this.newUser;

            this.newUser = {name:'',email:'',address:''}

          this.$http.post('/api/users',user)

            this.success = true
            self = this
            setTimeout(function () {
                self.success = false
            },5000)
            this.fetchUser()

      },
        ShowUser:function (id) {
            this.$http.get('/api/users/'+id).then((response)=>{
                this.newUser.id = response.data.id;
                this.newUser.name = response.data.name;
                this.newUser.email = response.data.email;
                this.newUser.address = response.data.address;
            });
            this.edit = true
        },
        EditUser:function(id){

            var user = this.newUser;

            this.newUser = {id:'',name:'',email:'',address:''};


            this.$http.patch('/api/users/'+id,user).then((response)=>{
                console.log(response.data)
            })
            this.fetchUser();
            this.edit = false;
        },
        DeleteUser:function (id) {
            var ConfirmBox = confirm("Are you sure");
            if(ConfirmBox){
                this.$http.delete('/api/users/'+id);
            }
            this.fetchUser();
        }
    },
    computed:{
        validation:function () {
            return{
                name:!!this.newUser.name.trim(),
                email:emailRe.test(this.newUser.email),
                address:!!this.newUser.address.trim()
            }

        },
        isValid:function () {
            var validation = this.validation;
            return Object.keys(validation).every(function (key) {
                return validation[key];
            })
        }
    },


  ready:function(){
      this.fetchUser();
  }
});