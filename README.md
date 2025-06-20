# ⚽ Agendafut API

Uma API RESTful em Laravel para agendamento de jogos de futebol. Permite gerenciar partidas e jogadores.

---

## ✅ Funcionalidades

- Gerenciamento completo (CRUD) de Partidas.
- Gerenciamento completo (CRUD) de Jogadores.
- Associar e desassociar jogadores de uma partida.

---

## Endpoints da API

### Jogos (`/api/games`)

| Método | Endpoint          | Descrição              |
| :----- | :---------------- | :--------------------- |
| `GET`  | `/games`          | Lista todas as partidas. |
| `POST` | `/games`          | Cria uma nova partida. |
| `GET`  | `/games/{id}`     | Exibe uma partida.     |
| `PUT`  | `/games/{id}`     | Atualiza uma partida.  |
| `DELETE`| `/games/{id}`     | Deleta uma partida.    |

### Jogadores (`/api/players`)

| Método | Endpoint          | Descrição               |
| :----- | :---------------- | :---------------------- |
| `GET`  | `/players`        | Lista todos os jogadores. |
| `POST` | `/players`        | Cria um novo jogador.   |
| `GET`  | `/players/{id}`   | Exibe um jogador.       |
| `PUT`  | `/players/{id}`   | Atualiza um jogador.    |
| `DELETE`| `/players/{id}`   | Deleta um jogador.      |

### Associação Jogador-Jogo

| Método | Endpoint                           | Descrição                 |
| :----- | :--------------------------------- | :------------------------ |
| `POST` | `/games/{game_id}/players`         | Adiciona jogador a um jogo. |
| `DELETE`| `/games/{game_id}/players/{player_id}` | Remove jogador de um jogo.  |

---

## 🛠️ Tecnologias

- Laravel 6
- PHP 8+
- MySQL / MariaDB

---

## ✍️ Autor e Licença

- **Autor:** Gabriel Burack ([github.com/GabrielBurack](https://github.com/GabrielBurack))
- **Licença:** Uso livre para estudo e modificação.
