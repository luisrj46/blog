<template>
      <div class="form-contact">
          <p v-if="send">Tu mensaje ha sido recibido, te contactaremos pronto</p>
            <form  v-else @submit.prevent="submit">
                <div class="input-container container-flex space-between">
                    <input  v-model="form.name" placeholder="Nombre" class="input-name">
                    <input  v-model="form.email" placeholder="Email" type="mail" class="input-email">
                </div>
                <div class="input-container">
                    <input  v-model="form.subject" placeholder="Asunto" class="input-subject">
                </div>
                <div class="input-container">
                    <textarea v-model="form.message" cols="30" rows="10" placeholder="Mensaje"></textarea>
                </div>
                <div class="send-message">
                    <button href="#" class="text-uppercase c-green">
                        <p v-if="enviar"> Enviando...</p>
                        <p v-else> Enviar Mensaje</p>
                        </button>
                </div>
            </form>
        </div>
</template>

<script>
export default {
    data(){
        return{
            send:false,
            enviar:false,
            form:{
            name:"un nombre",
            email:"unemail@gmail.com",
            subject:"este es un Asunto",
            message:"este es un mensaje de prueba"
        }
        }

    },
    methods:{
        submit(){
            this.enviar=true
            axios.post('/api/message', this.form)
            .then(res=>{
                this.send=true
            })
            .catch(err=>{
                this.enviar=false
                this.send=false
            })
        }
    }
}
</script>
