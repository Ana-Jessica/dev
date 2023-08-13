const express = require('express');
const http = require('http');
const socketIO = require('socket.io');
const mysql = require('mysql2');
const ejs = require('ejs');
const cookieParser = require('cookie-parser'); // Importe o cookie-parser
const bodyParser = require('body-parser');
const path = require('path');
const cookie = require('cookie'); // Importe o pacote 'cookie'

const app = express();
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
app.use(cookieParser()); // Use o cookie-parser middleware
const server = http.createServer(app);
const io = socketIO(server);

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'db_dev',
});
app.use(cookieParser());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, 'static')));
function getUserData(userId, callback) {
  db.query('SELECT id, nome, imagem_foto FROM programador WHERE id = ?', [userId], (err, results) => {
    if (err) {
      console.error('Erro ao consultar dados do usuário no banco de dados:', err);
      callback(err, null);
    } else {
      if (results.length === 0) {
        callback(new Error('Usuário não encontrado'), null);
      } else {
        callback(null, results[0]);
      }
    }
  });
}
function getAllProgramadores(callback) {
  db.query('SELECT id, nome FROM programador', (err, results) => {
    if (err) {
      console.error('Erro ao consultar programadores no banco de dados:', err);
      callback(err, null);
    } else {
      callback(null, results);
    }
  });
}
function getExistingMessages(callback) {
  db.query('SELECT messages.id, messages.mensagem, programador.nome AS nome_programador FROM messages JOIN programador ON messages.programador_id = programador.id ORDER BY messages.id ASC', (err, results) => {
    if (err) {
      console.error('Erro ao consultar mensagens no banco de dados:', err);
      callback(err, null);
    } else {
      const messages = results.map((row) => ({
        id: row.programador_id,
        username: row.nome_programador,
        message: row.mensagem,
      }));
      callback(null, messages);
    }
  });
}
app.get('/index_chat', (req, res) => {
  const cookies = cookie.parse(req.headers.cookie || ''); // Analise os cookies da solicitação
  const userId = cookies.user_id; // Obtenha o valor do cookie 'user_id'

  if (!userId) {
    res.status(401).send('Você não está autenticado.');
    return;
  }
  getUserData(userId, (err, userData) => {
    if (err) {
      console.error('Erro ao obter dados do usuário:', err);
      res.status(500).send('Erro ao obter dados do usuário');
    } else {
      getAllProgramadores((err, programadores) => {
        if (err) {
          console.error('Erro ao obter programadores do banco de dados:', err);
          res.status(500).send('Erro ao obter programadores');
        } else {
          getExistingMessages((err, oldMessages) => {
            if (err) {
              console.error('Erro ao obter mensagens do banco de dados:', err);
              res.status(500).send('Erro ao obter mensagens');
            } else {
              res.render('index_chat', { userData, userId, programadores, oldMessages });
            }
          });
        }
      });
    }
  });
});
app.post('/authenticate', (req, res) => {
  const user_id = req.body.user_id;
  // Faça o que for necessário com o user_id (por exemplo, definir um cookie)
  // Por exemplo, você pode armazenar o user_id em um cookie
  res.cookie('user_id', user_id);
  // Envie uma resposta de sucesso de volta ao PHP
  res.sendStatus(200);
});


io.on('connection', (socket) => {
  function sendExistingMessages() {
    getExistingMessages((err, messages) => {
      if (err) {
        console.error('Erro ao obter mensagens do servidor:', err);
      } else {
        socket.emit('old messages', messages);
      }
    });
  }
  sendExistingMessages();
  socket.on('chat message', (msg) => {
    console.log(msg);
    console.log('Mensagem recebida:', msg);
    const programadorId = msg.programador_id;
    db.query('SELECT nome FROM programador WHERE id = ?', [programadorId], (err, results) => {
      if (err) {
        console.error('Erro ao verificar o programador_id no banco de dados:', err);
      } else {
        if (results.length === 0) {
          console.error('ID do programador não encontrado:', programadorId);
        } else {
          const nomeProgramador = results[0].nome;
          db.query('INSERT INTO messages (programador_id, mensagem) VALUES (?, ?)', [programadorId, msg.message], (err) => {
            if (err) {
              console.error('Erro ao inserir mensagem no banco de dados:', err);
            } else {
            // Dentro do evento 'chat message' no servidor
            io.emit('chat message', [{ username: nomeProgramador, message: msg.message}]);

            }
          });
        }
      }
    });
  });
  socket.on('disconnect', () => {
    console.log('Usuário desconectado.');
  });
});
const port = 3000;
server.listen(port, () => {
  console.log(`Servidor ouvindo na porta ${port}`);
});