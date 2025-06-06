import React from 'react';
import { StyleSheet, Text, TouchableOpacity, View, Image, ScrollView } from 'react-native';

export default function Home() {
  return (
    <ScrollView style={styles.body}>

      <View style={styles.header}>
        <Text style={styles.header__title}>Home</Text>
      </View>

      <View style={styles.main}>
        <Text style={styles.main__title}>Animais Cadastrados</Text>

        <View style={styles.main__content}>
          <View style={styles.content__animalBox}>
            <Text style={styles.animalBox__tipo}>Dog</Text>
            <Text style={styles.animalBox__raca}>Raça: Labrador</Text>
            <Text style={styles.animalBox__idade}>Idade: 5</Text>
          </View>
          <View style={styles.content__animalBox}>
            <Text style={styles.animalBox__tipo}>Dog</Text>
            <Text style={styles.animalBox__raca}>Raça: Labrador</Text>
            <Text style={styles.animalBox__idade}>Idade: 5</Text>
          </View>
          <View style={styles.content__animalBox}>
            <Text style={styles.animalBox__tipo}>Dog</Text>
            <Text style={styles.animalBox__raca}>Raça: Labrador</Text>
            <Text style={styles.animalBox__idade}>Idade: 5</Text>
          </View>

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
    paddingTop: 20,
    width: "100%",
    height: "100%",
    alignItems: "center",
    flexDirection: "column",
  },
  main__title: {
    fontSize:23,
    fontWeight: 600,
    color: "#4F82E9",
  },
  main__content: {
    display: "flex",
    width: "100%",
    paddingTop: 10,
    paddingBottom: 0,
    paddingRight: 20,
    paddingLeft: 20,
    gap: 12,
  },
  content__animalBox: {
    display: "flex",
    width: "100%",
    flexDirection: "column",
    justifyContent: "center",
    boxShadow: '0px 0px 6px 0px #08BDFE',
    borderRadius: 8,
    backgroundColor: "#0D0D0D",
    paddingTop: 12,
    paddingBottom: 12,
    paddingRight: 8,
    paddingLeft: 8,
  },
  animalBox__tipo: {
    fontSize: 15,
    color: "#FFFFFF",
  },
  animalBox__raca: {
    fontSize: 15,
    color: "#FFFFFF",
  },
  animalBox__idade: {
    fontSize: 15,
    color: "#FFFFFF",
  },
});
