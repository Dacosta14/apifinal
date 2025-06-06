import React from 'react';
import { StyleSheet, Text, TouchableOpacity, View, Image, ScrollView } from 'react-native';

export default function Profile() {
  return (
    <ScrollView style={styles.body}>
      <View style={styles.header}>
        <Text style={styles.header__title}>Profile</Text>
      </View>
    
      <View style={styles.main}> 
        <View style={styles.main__content}> 
          <View style={styles.main__boxImg}>
            <Image
            source={require('../assets/profile.png')}
            style={styles.main__img}
            />
          </View>
          <View style={styles.content__body}>
            <Text style={styles.main__textInfos}>Email: darlan@gmail.com</Text>
            <Text style={styles.main__textInfos}>Nome: Darlan</Text>
            <Text style={styles.main__textInfos}>Data de nascimento: 08/12/2000</Text>
            <Text style={styles.main__textInfos}>Departamento: 11</Text>
            <TouchableOpacity style={styles.main__buttonEditar}>
              <Text style={styles.button__text}>Editar</Text>
            </TouchableOpacity>
          </View>
            <TouchableOpacity style={styles.main__button}>
              <Text style={styles.button__text}>Sair</Text>
            </TouchableOpacity>
        </View>
      </View>

    </ScrollView>
  );
}
const styles = StyleSheet.create({
  body: {
    height: "100%",
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
  },
  main__content: {
    display: "flex",
    width: "100%",
    minHeight: 500,
    height: "100%",
    flexDirection: "column",
    backgroundColor: "#0D0D0D",
    boxShadow: '0px 0px 6px 0px #08BDFE',
    borderRadius: 8,
    gap: 25,
    paddingTop: 30,
    paddingBottom: 12,
  },
  main__boxImg: {
    display: "flex",
    justifyContent: "center",
    alignItems: "center",
    width: "100%",
  },
  main__img: {
    width: 140,
    height: 140,
  },
  content__body: {
    paddingRight: 30,
    paddingLeft: 30,
    gap: 4,
  },
  main__textInfos: {
    fontSize: 17,
    color: "#FFFFFF",
  },
  main__buttonEditar: {
    marginTop: 20,
    alignItems: "center",
    width: 70,
    justifyContent: "center",
    boxShadow: '0px 0px 6px 0px #08BDFE',
    borderRadius: 5,
    height: 30,
  },
  main__button: {
    position: "absolute",
    right: 30,
    left: 30,
    bottom: 30,
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
  }
});
