-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.22-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para clientes
CREATE DATABASE IF NOT EXISTS `clientes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `clientes`;

-- Copiando estrutura para tabela clientes.cad_cliente
CREATE TABLE IF NOT EXISTS `cad_cliente` (
  `id_cliente` int(10) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(60) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `ie` varchar(20) NOT NULL,
  `contato_cliente` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrato` varchar(10) NOT NULL,
  `observacao` varchar(1000) NOT NULL,
  `data` date NOT NULL,
  `valor_hora` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela clientes.cad_cliente: ~3 rows (aproximadamente)
DELETE FROM `cad_cliente`;
/*!40000 ALTER TABLE `cad_cliente` DISABLE KEYS */;
INSERT INTO `cad_cliente` (`id_cliente`, `cliente`, `endereco`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `cnpj`, `ie`, `contato_cliente`, `telefone`, `fax`, `email`, `contrato`, `observacao`, `data`, `valor_hora`) VALUES
	(1, 'DIEGO SOUZA', 'Rua Condor', '666', 'Parque Continental', 'Guarulhos', 'SP', '07124-670', '00.000.000/0000-00', '000000000', 'DIEGO', '(00) 000-0000', '', 'DIEGO@DIEGO.COM', 'NAO', 'teste', '2019-03-03', ''),
	(2, '4A COMERCIAL ELÃ‰TRICA LTDA', 'Rua Padre JoÃ£o Ãlvares', '44', 'Vila Renata', 'Guarulhos', 'SP', '07056-000', '11.111.111/1111-11', '', 'Priscila', '(00) 00000-0000', '', 'cadastro@4aeletrica.com.br', 'SIM', 'AAA', '2019-03-11', ''),
	(3, 'TESTE NOW', 'Rua Condor, 666', '44', 'Parque Continental', 'Guarulhos', 'SP', '07124-670', '11.111.111/1111-11', '', 'Priscila', '(00) 0000-0000', '', 'DIEGO@DIEGO.COM', 'INATIVO', 'AAA', '2019-03-11', '');
/*!40000 ALTER TABLE `cad_cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela clientes.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nivel` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `data` date NOT NULL,
  `obs` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela clientes.usuarios: ~4 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`cod_user`, `login`, `nome`, `senha`, `nivel`, `status`, `data`, `obs`) VALUES
	(1, 'admin', 'Administrador', '6116afedcb0bc31083935c1c262ff4c9', 1, 1, '2019-03-24', 'Administrador'),
	(2, 'diego', 'Diego', '6116afedcb0bc31083935c1c262ff4c9', 1, 1, '2019-03-18', 'SUPERVISOR'),
	(4, 'teste', 'teste', '6116afedcb0bc31083935c1c262ff4c9', 3, 2, '2019-03-20', 'aaa'),
	(5, 'ronaldo', 'ronaldo', '6116afedcb0bc31083935c1c262ff4c9', 3, 1, '2019-03-29', 'usuario');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
