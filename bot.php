

<?php


$conn = mysqli_connect("localhost","root","","onlinebot");

if($conn){
$user_messages = mysqli_real_escape_string($conn, $_POST['messageValue']);


$query = "SELECT * FROM chatbot WHERE messages LIKE '%$user_messages%'";
$runQuery = mysqli_query($conn, $query);

if(mysqli_num_rows($runQuery) > 0){
    // fetch result
    $result = mysqli_fetch_assoc($runQuery);
    // echo result
    echo $result['response'];
}else{
    echo "Bonjour, comment puis-je vous aider aujourd'hui ? Si vous cherchez des formations pour améliorer vos
     compétences professionnelles, je peux vous aider à trouver des options adaptées
     à vos besoins. Quel domaine vous intéresse le plus, par exemple le développement web, le marketing digital,design,
     la gestion de projet ,ou les langues étrangères ? (tapez 'formation' pour voire les formations disponibles)";
}
}else{
    echo "connection Failed " . mysqli_connect_errno();
}
?>