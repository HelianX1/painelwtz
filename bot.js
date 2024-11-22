var request = require('request');

const qrcode = require('qrcode-terminal');

const { Client } = require('whatsapp-web.js');

const client = new Client();

palavras = ['Tela','Display','Bateria','Carcaça','carcasa','do','4g','5g','?', '!', '.', ',', 'Dock','Doc','Moto','Xiaomi','Motorola'];

client.on('ready', () => {
    console.log('Client is ready!');
});

client.on('qr', qr => {
    qrcode.generate(qr, { small: true });
});
client.on('message', message => {

    // reply back "pong" directly to the message
    console.log(message.author+'Mensagem recebida: ' + message.body);
    // remover caracteris especiais mensagem.body
    message.body = message.body.replace(/[^a-zA-Z0-9]/g, '');
    // remover palavras
    palavras.forEach(palavra => {
        message.body = message.body.replace(palavra, '');
    });
    
    request('http://localhost/painelwtz/api.php?id_loja=2&produto=' + message.body, function (error, response, body) {
 
        if (body.includes('440')) {
            console.log('Produto não encontrado');
            
        } else{
            console.log('Produto encontrado');
            message.reply(body.trim());
        }
    }
    );
});


client.initialize();
