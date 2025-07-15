<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cobre Online</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</head>

<body>
    <div id="app" class="container">
        <h1>Cobre Online</h1>

        <form @submit.prevent="enviarFormulario">
            <p>
                <label>
                    Nome:
                    <input type="text" v-model="form.nome" require class="form-control form-group" />
                </label>
            </p>

            <p>
                <label>
                    Email:
                    <input type="text" v-model="form.email" required class="form-control form-group" />
                </label>
            </p>

            <p>
                <label>
                    Valor:
                    <input type="text" v-model="form.valor" required class="form-control form-group" />
                </label>
            </p>

            <p>
                <label>
                    Data de vencimento:
                    <input type="date" v-model="form.data" required class="form-control form-group" />
                </label>
            </p>





            <button type="submit" class="btn btn-dark">Cadastrar</button>
        </form>

        <div v-if="mensagem" :class="['mensagem', sucesso ? 'sucesso' : 'erro']">
            {{ mensagem }}
        </div>
    </div>

    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    form: {
                        nome: '',
                        email: '',
                        valor: '',
                        data: ''
                    },
                    mensagem: '',
                    sucesso: false
                }
            },
            methods: {
                async enviarFormulario() {
                    // Validação básica
                    const valorConvertido = parseFloat(this.form.valor.replace(',', '.'))

                    if (isNaN(valorConvertido)) {
                        this.mensagem = 'O valor precisa ser um número válido.'
                        this.sucesso = false
                        return
                    }

                    // Montar objeto para envio
                    const dados = {
                        nome: this.form.nome,
                        email: this.form.email,
                        valor: valorConvertido,
                        data: this.form.data, // formato YYYY-MM-DD já vem do input[type="date"]
                        status: "Pendente"
                    }

                    try {
                        const resposta = await fetch('http://localhost/CobreOnline/api/cobranca', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(dados)
                        })

                        const retorno = await resposta.json()

                        if (!resposta.ok) {
                            throw new Error(retorno.erro || 'Erro ao processar a requisição')
                        }

                        this.mensagem = 'Formulário enviado com sucesso!'
                        this.sucesso = true

                        this.form = { nome: '', email: '', valor: '', data: '' }
                    } catch (erro) {
                        this.mensagem = 'Erro: ' + erro.message
                        this.sucesso = false
                    }
                }
            }
        }).mount('#app');
    </script>
</body>

</html>