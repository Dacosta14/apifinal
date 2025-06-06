import React, { useState } from 'react';
import { StyleSheet, Text, TouchableOpacity, TextInput, View, Image, ScrollView } from 'react-native';

export default function Login() {
  const [email, setEmail] = useState('mocado');
  const [senha, setSenha] = useState('mocado');
  const [data, setData] = useState('mocado');
  const [departamento, setDepartamento] = useState('mocado');
  const [supervisor, setSupervisor] = useState('mocado');
  const [grupos, setGrupos] = useState('mocado');
  
  return (
    <ScrollView style={styles.body}>
      <View style={styles.header}>
        <Text style={styles.header__title}>Editar perfil</Text>
      </View>
    
      <View style={styles.main}> 
        <View style={styles.main__content}> 

          <Text style={styles.label}>Email:</Text>
          <TextInput
          style={styles.input}
          value={email}
          onChangeText={setEmail}
          placeholder="Digite o email"
          keyboardType="email-address"
          />

          <Text style={styles.label}>Senha:</Text>
          <TextInput
          style={styles.input}
          value={senha}
          onChangeText={setSenha}
          placeholder="Digite uma senha"
          />

          <Text style={styles.label}>Data:</Text>
          <TextInput
          style={styles.input}
          value={data}
          onChangeText={setData}
          placeholder="Digite uma Data"
          />

          <Text style={styles.label}>Departamento:</Text>
          <TextInput
          style={styles.input}
          value={departamento}
          onChangeText={setDepartamento}
          placeholder="Digite uma Departamento"
          />

          <Text style={styles.label}>Supervisor:</Text>
          <TextInput
          style={styles.input}
          value={supervisor}
          onChangeText={setSupervisor}
          placeholder="Digite uma Supervisor"
          />


          <Text style={styles.label}>Grupos:</Text>
          <TextInput
          style={styles.input}
          value={grupos}
          onChangeText={setGrupos}
          placeholder="Digite uma Grupos"
          />

          <TouchableOpacity style={styles.main__button}>
            <Text style={styles.button__text}>Editar</Text>
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
