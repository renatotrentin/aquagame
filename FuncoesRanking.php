<?php 
	class FuncoesRanking{
		public $db;

		public function __construct(){
			$db = new Conexao();
			$this->db = $db->conectar();
		}

		public function rankGlobal(){
			$query = $this->db->prepare("SELECT * from usuario inner join pontuacao on id_usuario=usuario_pontos order by pontos_pontuacao desc");
			$query->execute();
			$valor=1;
			while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				echo "<tr class='estilotr'>";
					echo "<td>".$valor++."</td>";
					echo "<td>".$encontrar['nome_usuario']."</td>";
					echo "<td>".$encontrar['usuario_usuario']."</td>";
					echo "<td>".$encontrar['pontos_pontuacao']."</td>";
				echo "</tr>";
			}
		}
		public function rankGlobal_mobile(){
			$query = $this->db->prepare("SELECT * from usuario inner join pontuacao on id_usuario=usuario_pontos order by pontos_pontuacao desc");
			$query->execute();
			$valor=1;
			while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				echo "<tr class='estilotr'>";
					echo "<td>".$valor++."</td>";
					echo "<td>".$encontrar['usuario_usuario']."</td>";
					echo "<td>".$encontrar['pontos_pontuacao']."</td>";
				echo "</tr>";
			}
		}
	}

?>