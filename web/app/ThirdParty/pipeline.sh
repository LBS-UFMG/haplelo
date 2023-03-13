# etapa 1: executa o PHASE 
../PHASE2.1.1/PHASE -MS -f1 -S$RANDOM "../input/input.inp" ./output/acre 400000 1000 50000 &

# etapa 2: realiza pre-processamento dos dados (halelos)
sed --expression='/BEGIN LIST_SUMMARY/,/END LIST_SUMMARY/{ /LIST_SUMMARY/d; p }' --quiet /output/acre | column -t | tr -s ' ' | tr ' ' , > ./output/halelos.csv

# etapa 3: outro pre-processamento dos dados (pacientes)
sed --expression='/BEGIN BESTPAIRS_SUMMARY/,/END BESTPAIRS_SUMMARY/{ /BESTPAIRS_SUMMARY/d; p }' --quiet /output/acre | tr ':(),' ' ' | sort | column -t | tr -s ' ' | tr ' ' , > ./output/pacientes.csv

# etapa 4: processa tabela
python processa_tabela.py