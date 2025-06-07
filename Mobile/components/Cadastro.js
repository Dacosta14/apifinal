import React, { useState } from 'react';
import { View, TextInput, Button, Image, StyleSheet, ActivityIndicator, Alert } from 'react-native';

import { auth, db, storage } from '../services/firebaseConfig';
import { createUserWithEmailAndPassword } from 'firebase/auth';
import { doc, setDoc } from 'firebase/firestore';
import { ref, uploadBytes, getDownloadURL } from 'firebase/storage';

import { launchImageLibrary } from 'react-native-image-picker';

export default function Signup() {
  const [email, setEmail] = useState('');
  const [senha, setSenha] = useState('');
  const [nome, setNome] = useState('');
  const [imagemUri, setImagemUri] = useState(null);
  const [loading, setLoading] = useState(false);

  async function escolherImagem() {
    const result = await launchImageLibrary({ mediaType: 'photo', quality: 0.7 });
    if (result.didCancel) return;
    if (result.assets && result.assets.length > 0) {
      setImagemUri(result.assets[0].uri);
    }
  }

  async function cadastrar() {
    if (!email || !senha || !nome || !imagemUri) {
      Alert.alert('Erro', 'Preencha todos os campos e selecione a imagem!');
      return;
    }

    setLoading(true);

    try {
      // 1. Cria usuário no Firebase Auth
      const userCredential = await createUserWithEmailAndPassword(auth, email, senha);
      const userId = userCredential.user.uid;

      // 2. Upload da imagem no Storage
      const response = await fetch(imagemUri);
      const blob = await response.blob();

      const imageRef = ref(storage, `profileImages/${userId}.jpg`);
      await uploadBytes(imageRef, blob);

      // 3. Pega URL pública da imagem
      const downloadURL = await getDownloadURL(imageRef);

      // 4. Salva dados no Firestore (coleção 'users', doc = uid)
      await setDoc(doc(db, 'users', userId), {
        uid: userId,
        email,
        nome,
        profileImage: downloadURL
      });

      Alert.alert('Sucesso', 'Usuário cadastrado!');
      setEmail('');
      setSenha('');
      setNome('');
      setImagemUri(null);

    } catch (error) {
      Alert.alert('Erro no cadastro', error.message);
    } finally {
      setLoading(false);
    }
  }

  return (
    <View style={styles.container}>
      <TextInput placeholder="Email" value={email} onChangeText={setEmail} style={styles.input} />
      <TextInput placeholder="Senha" value={senha} onChangeText={setSenha} secureTextEntry style={styles.input} />
      <TextInput placeholder="Nome" value={nome} onChangeText={setNome} style={styles.input} />

      <Button title="Escolher Imagem" onPress={escolherImagem} />
      {imagemUri && <Image source={{ uri: imagemUri }} style={styles.image} />}

      {loading ? <ActivityIndicator size="large" /> : <Button title="Cadastrar" onPress={cadastrar} />}
    </View>
  );
}
