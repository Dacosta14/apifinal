
import React, { useState } from 'react';
import { StyleSheet, Text, TouchableOpacity, TextInput, View, Image, ScrollView } from 'react-native';

export default function Cadastroanimais() {
  const [nome, setNome] = useState('');
  const [especie, setEspecie] = useState('');
  const [raca, setRaca] = useState('');
  const [idade, setIdade] = useState('');
  
  return (
    <ScrollView style={styles.body}>
      <View style={styles.header}>
        <Text style={styles.header__title}>Cadastro de Animal</Text>
      </View>
    
      <View style={styles.main}> 
        <View style={styles.main__content}> 

          <Text style={styles.label}>Nome:</Text>
          <TextInput
          style={styles.input}
          value={nome}
          onChangeText={setNome}
          placeholder="Digite o Nome"
          />

          <Text style={styles.label}>Especie:</Text>
          <TextInput
          style={styles.input}
          value={especie}
          onChangeText={setEspecie}
          placeholder="Digite a especie"
          />

          <Text style={styles.label}>Raça:</Text>
          <TextInput
          style={styles.input}
          value={raca}
          onChangeText={setRaca}
          placeholder="Digite a Raca"
          />

          <Text style={styles.label}>Idade:</Text>
          <TextInput
          style={styles.input}
          value={idade}
          onChangeText={setIdade}
          placeholder="Digite a Idade"
          />

          <TouchableOpacity style={styles.main__button}>
            <Text style={styles.button__text}>Cadastrar animal</Text>
          </TouchableOpacity>
        </View>
      </View>
    </ScrollView>
  );
}
const styles = StyleSheet.create({
  body: {
    display: "flex",
    width: "100%",
    backgroundColor: "#000000",
  },
  header: {
    justifyContent: "flex-end",
    width: "100%",
    height: 70,
    backgroundColor: "#0D0D0D",
    boxShadow: '0px 0px 12px 0px #08BDFE',
    paddingBottom: 12,
    paddingLeft: 20,
    paddingRight: 12,
  },
  header__title: {
    fontSize:25,
    fontWeight: 600,
    color: "#08BDFE",
  },
  main: {
    display: "flex",
    justifyContent: "center",
    alignItems: "center",
    paddingTop: 20,
    paddingLeft: 20,
    paddingRight: 20,
    width: "100%",
    height: "100%",
    alignItems: "center",
    flexDirection: "column",
    paddingBottom: 80,
  },
  main__content: {
    display: "flex",
    width: "100%",
    flexDirection: "column",
    backgroundColor: "#0D0D0D",
    boxShadow: '0px 0px 6px 0px #08BDFE',
    borderRadius: 8,
    gap: 10,
    paddingTop: 30,
    paddingBottom: 30,
    paddingRight: 30,
    paddingLeft: 30,
  },
  label: {
    color: "#FFFFFF",
  },
  input: {
    color: "#FFFFFF",
    borderColor: "#FFFFFF",
    paddingLeft: 10,
    borderWidth: 1,
    borderRadius: 5,
  },
  main__button: {
    marginTop: 10,
    height: 40,
    borderRadius: 5,
    alignItems: "center",
    justifyContent: "center",
    backgroundColor: "#08BDFE"
  },
  button__text: {
    color: "#FFFFFF",
    fontSize: 18,
    fontWeight: 600,
  },
});
