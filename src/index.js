import React from 'react'
import ReactDOM from 'react-dom'
import ApolloClient from 'apollo-boost'
import { ApolloProvider } from 'react-apollo'
import Context from './Context'

import { App } from './App'

const client = new ApolloClient({
  uri: 'http://localhost/servergraphql/',
  request: (operation) => {
    const token = localStorage.getItem('token')
    operation.setContext({
      headers: {
        authorization: token ? `Bearer ${token}` : ''
      }
    })
  }
})

ReactDOM.render(
  <Context.Provider>
    <ApolloProvider client={client}>
      <App/>
    </ApolloProvider>
  </Context.Provider>,
  document.getElementById('app'))
