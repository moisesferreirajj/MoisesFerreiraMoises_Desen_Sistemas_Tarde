from selenium import webdriver
from selenium.webdriver.common.by import By
import time

# Configuração do WebDriver (nesse exemplo, estamos usando o Chrome)
driver = webdriver.Chrome()

# Acessa a página de cadastro do cliente usando o caminho absoluto com o protocolo file://
# Certifique-se de que o caminho está apontado para o HTML específico
#driver.get("file:///C:/Users/moises_j_ferreira/Documents/GitHub/MoisesFerreiraMoises_Desen_Sistemas_Tarde/TesteDeSistemas_Alann/TesteDeSistemas_MoisesFerreira/index.html")
driver.get("file:///C:/Users/moises_j_ferreira/Documents/GitHub/MoisesFerreiraMoises_Desen_Sistemas_Tarde/TesteDeSistemas_Alann/TesteDeSistemas_MoisesFerreira/index.html")
# Aguarda o carregamento da página
time.sleep(1)

# Preenche o campo Nome
name_input = driver.find_element(By.ID, "name")
name_input.send_keys("João da Silva")

# Preenche o campo CPF
cpf_input = driver.find_element(By.ID, "cpf")
cpf_input.send_keys("12345678900")

# Preenche o campo Endereço
endereco_input = driver.find_element(By.ID, "address")
endereco_input.send_keys("Rua das Flores, 123")

# Preenche o campo Telefone
telefone_input = driver.find_element(By.ID, "phone")
telefone_input.send_keys("11987654321")

# Clica no botão "Cadastrar"
cadastrar_button = driver.find_element(By.ID, "cadastrar")
cadastrar_button.click()

# Aguarde a resposta do cadastro
time.sleep(3)

# Fecha o navegador
driver.quit()