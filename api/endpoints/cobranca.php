<?php

if ($method === 'GET') {
   $smtm = $pdo->query("SELECT * FROM cobranca");
   echo json_encode($smtm->fetchAll(PDO::FETCH_ASSOC));

}else if ($method === 'POST') {


   $data = json_decode(file_get_contents('php://input'), true);

   $smtm = $pdo->prepare("INSERT INTO cobranca (nome, email, valor, data, status) VALUES (?, ?, ?, ?, ?)");
   $smtm->execute([$data['nome'], $data['email'], $data['valor'], $data['data'], $data['status']]);
   echo json_encode(['messagem'=> 'Cobrança cadastrada!'], JSON_UNESCAPED_UNICODE);

}else if ($method === 'DELETE') {
   $id = $request[0] ?? null;
   if(!$id || !is_numeric($id)){
      http_response_code(400);
      echo json_encode(['erro' => 'ID válido é necessário!'], JSON_UNESCAPED_UNICODE);
      exit();
   }
   $smtm = $pdo->prepare("DELETE FROM cobranca WHERE id = ?");
   $smtm->execute([$id]);
   echo json_encode(['mensagem'=> 'Cobrança excluída!'], JSON_UNESCAPED_UNICODE);

}else if ($method === 'PUT') { 

   $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['status']) || empty($data['status'])) {
      echo json_encode(['erro' => 'Campo "status" é obrigatório.'], JSON_UNESCAPED_UNICODE);
    }

   $id = $request[0] ?? null;
   if(!$id || !is_numeric($id)){
      http_response_code(400);
      echo json_encode(['erro' => 'ID válido é necessário!'], JSON_UNESCAPED_UNICODE);
      exit();
   }

   $smtm = $pdo->prepare("UPDATE cobranca SET status = ? WHERE id = ?");
   $smtm->execute([$data['status'], $id]);
   echo json_encode(['mensagem'=> 'Cobrança atualizada!'], JSON_UNESCAPED_UNICODE);


}else{
   http_response_code(405);
   echo json_encode(['erro'=> 'Método inválido!'], JSON_UNESCAPED_UNICODE);
}