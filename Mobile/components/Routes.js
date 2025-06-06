import * as React from 'react';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { MaterialCommunityIcons } from '@expo/vector-icons';

import Home from './Home';
import Profile from './Profile';
import Cadastroanimais from './Cadastroanimais';
import Login from './Login';
import Editaranimal from './Editaranimal';
import Editarperfil from './Editarperfil';

const Tab = createBottomTabNavigator();

export default function Routes() {
  return (
    <Tab.Navigator
      initialRouteName="Home"
      screenOptions={{
        tabBarActiveTintColor: '#b94646',
      }}
    >
      <Tab.Screen
        name="Home"
        component={Home}
        options={{
          tabBarLabel: 'Home',
          tabBarIcon: ({ color, size }) => (
            <MaterialCommunityIcons name="home" color={color} size={size} />
          ),
        }}
      />

      <Tab.Screen
        name="Editarperfil"
        component={Editarperfil}
        options={{
          tabBarLabel: 'Editarperfil',
          tabBarIcon: ({ color, size }) => (
            <MaterialCommunityIcons name="home" color={color} size={size} />
          ),
        }}
      />

      <Tab.Screen
        name="Profile"
        component={Profile}
        options={{
          tabBarLabel: 'Profile',
          tabBarIcon: ({ color, size }) => (
            <MaterialCommunityIcons name="account" color={color} size={size} />
          ),
        }}
      />

      <Tab.Screen
        name="Cadastroanimais"
        component={Cadastroanimais}
        options={{
          tabBarLabel: 'Cadastroanimais',
          tabBarIcon: ({ color, size }) => (
            <MaterialCommunityIcons name="account" color={color} size={size} />
          ),
        }}
      />

      <Tab.Screen
        name="Editaranimal"
        component={Editaranimal}
        options={{
          tabBarLabel: 'Editaranimal',
          tabBarIcon: ({ color, size }) => (
            <MaterialCommunityIcons name="account" color={color} size={size} />
          ),
        }}
      />

      <Tab.Screen
        name="Login"
        component={Login}
        options={{
          // Para nao aparecer embaixo
          tabBarStyle: { display: 'none' },
          tabBarButton: () => null,
        }}
      />
    </Tab.Navigator>
  );
}
