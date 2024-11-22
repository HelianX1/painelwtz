var request = require('request');

const qrcode = require('qrcode-terminal');

const { Client } = require('whatsapp-web.js');

const client = new Client();


client.on('ready', () => {
    console.log('Client is ready!');
});

client.on('qr', qr => {
    qrcode.generate(qr, { small: true });
});
client.on('message', message => {
    console.log('Mensagem recebida: ', message.body);
    console.log('http://localhost/painelwtz/api.php?id_loja=2&produto=' + message.body);
    request('http://localhost/painelwtz/api.php?id_loja=2&produto=' + message.body, function (error, response, body) {

            message.reply(body);
            console.log(body);
    });
});


client.initialize();
