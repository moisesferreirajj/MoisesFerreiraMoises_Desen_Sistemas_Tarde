from selenium import webdriver
from selenium.webdriver.common.by import By
import time

# Configuração do WebDriver (nesse exemplo, estamos usando o Chrome)
driver = webdriver.Chrome()

# Acessa a página de cadastro do cliente usando o caminho absoluto com o protocolo file://
# Certifique-se de que o caminho está apontado para o HTML específico
driver.get("file:///C:/Users/moises_j_ferreira/Documents/GitHub/MoisesFerreiraMoises_Desen_Sistemas_Tarde/TesteDeSistemas_Alann/AtividadeCadastroProduto/index.html")
# Aguarda o carregamento da página
time.sleep(1)

code_input = driver.find_element(By.ID, "code")
code_input.send_keys("190")
time.sleep(3)

description_input = driver.find_element(By.ID, "description")
description_input.send_keys("Um produto magnífico e incrível para todo público!")
time.sleep(3)

marca_input = driver.find_element(By.ID, "marca")
marca_input.send_keys("Polishop")
time.sleep(3)

price_input = driver.find_element(By.ID, "price")
price_input.send_keys("100,00")
time.sleep(3)

quanti_input = driver.find_element(By.ID, "quanti")
quanti_input.send_keys("50")
time.sleep(3)

# Clica no botão "Cadastrar"
cadastrar_button = driver.find_element(By.ID, "cadastrar")
cadastrar_button.click()

# Aguarde a resposta do cadastro
time.sleep(3)

# Fecha o navegador
driver.quit()