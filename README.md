## INSTRUÇÕES ##
.Primeiro passo para utilização do módulo é a sua ativação, pode-se executar o comando "bin/magento module:enable
Wayne_ButtonStyle" para fazer a ativação deste.

.É necessario também executar "bin/magento setup:upgrade"

.Após isso executa-se o comando "bin/magento button:style 000000", os zeros da sentença correspondem a cor escolhida.

.Após a execução desse comando e a mensagem "Style changed" ter sido printada na tela pode-se executar o comando "rm -rf
var/view_preprocessed/* pub/static/* generated/*" para limpar os caches e a cor escolhida ser aplicada.

