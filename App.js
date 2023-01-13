import React, { useState, useEffect } from 'react';
import { StyleSheet, View, Text, Button, TextInput, ActivityIndicator } from 'react-native';


const App = () => {
  const [userMessage, setUserMessage] = useState('');
  const [message, setMessage] = useState('');
  const [loading, setLoading] = useState(false);

  const startLoading = () => {
    setLoading(true);
  };

  const addPosts = async () => {

    if (userMessage.trim().length != 0) {
      startLoading();

      // https://webhook.site/c2b764f5-8b26-41dc-b4c0-d6f65f63abc0

      try {
        await fetch('http://192.168.26.58/iws/07/web/index.php', {
          method: 'POST',
          body: JSON.stringify({
            message: userMessage,
            token: '217658fhjUjnJkpSLSLSok9948x7238Mnknfhu4721',
          }),
          headers: {
            'Accet': 'application/json',
            'Content-type': 'application/json; charset=UTF-8',
          },
        })
          .then((response) => response.json())
          .then((data) => {
            setLoading(false);
            setUserMessage('');
            setMessage(data.message);
            setTimeout(() => {
              setMessage('');
            }, 2000);

          })
          .catch((err) => {
            console.log(err.message);
          });
      }
      catch (error) {
        console.log('Error', error);
      }
    }
    else {
      setMessage('Enter your message!');
      setTimeout(() => {
        setMessage('');
      }, 2000);
    }
  };

  return (
    <View style={styles.container}>
      {loading ? (
        <ActivityIndicator
          visible={loading}
          textContent={'Loading...'}
          textStyle={styles.spinnerTextStyle}
          size='large'
        />
      ) : (
        <>
          <TextInput
            style={styles.input}
            placeholder="Type your message"
            defaultValue={userMessage}
            onChangeText={(text) => setUserMessage(text)}
          />
          <Button onPress={addPosts}
            title="Send data"
          />
          <Text>{message}</Text>
        </>
      )}
    </View>
  );
};
const styles = StyleSheet.create({

  input: {
    padding: 10,
    marginVertical: 15,
    borderWidth: 2,
    height: 50,
    width: 250,
  },
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  spinnerTextStyle: {
    color: '#FFF',
  },
});

export default App;
