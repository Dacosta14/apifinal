import React, { useEffect, useState } from 'react';
import { View, Text, Image, Button, StyleSheet, ActivityIndicator, Alert } from 'react-native';

import { auth, db } from '../firebaseConfig';
import { doc, getDoc } from 'firebase/firestore';
import { signOut } from 'firebase/auth';

export default function Profile({ navigation }) {
  const [userData, setUserData] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    async function loadUser() {
      try {
        const user = auth.currentUser;
        if (!user) {
          navigation.replace('Login');
          return;
        }

        const userDoc = await getDoc(doc(db, 'users', user.uid));
        if (userDoc.exists()) {
          setUserData(userDoc.data());
        } else {
          Alert.alert('Erro', 'Dados do usuário não encontrados.');
        }
      } catch (error) {
        Alert.alert('Erro', error.message);
      } finally {
        setLoading(false);
      }
    }

    loadUser();
  }, []);

  async function sair() {
    try {
      await signOut(auth);
      navigation.replace('Login');
    } catch (error) {
      Alert.alert('Erro', error.message);
    }
  }

  if (loading) {
    return <ActivityIndicator style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }} size="large" />;
  }

  if (!userData) {
    return (
      <View style={styles.container}>
        <Text>Usuário não encontrado</Text>
      </View>
    );
  }

  return (
    <View style={styles.container}>
      <Image
        source={userData.profileImage ? { uri: userData.profileImage } : require('../assets/profile.png')}
        style={styles.image}
      />
      <Text style={styles.text}>Nome: {userData.nome}</Text>
      <Text style={styles.text}>Email: {userData.email}</Text>
      <Button title="Sair" onPress={sair} />
    </View>
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
