import 'regenerator-runtime/runtime';
import React from "react";
import ReactDOM from "react-dom";
import $ from "jquery";
import { connect } from '@aragon/connect';
import { AragonApi, useAragonApi } from '@aragon/api-react';
import { Cast, Vote, Voting } from '@aragon/connect-thegraph-voting';
/**
 * below is test rendring to insure react is working fine
 */
class Hello extends React.Component {
    render() {
      return React.createElement('div', null, `Wellcome to Aragon Connect Plugin`);
    }
}
ReactDOM.render(
    React.createElement(Hello, {toWhat: 'World'}, null),
    document.getElementById('root')
);
/**
 *that is the code for fetching aragon API components 
 */
function App() {
    const { api, appState } = useAragonApi()
    const { count = 0 } = appState
  
    return (
      <div>
        <div>{count}</div>
        <button onClick={() => api.increment(1).toPromise()}>Increment</button>
      </div>
    )
  }
  
  ReactDOM.render(
    <AragonApi>
      <App />
    </AragonApi>,
    document.getElementById('aragon')
  )
/**
 * below is the code to get organization through aragon connect
 */
$(document).ready(function(){
    loadConnect();
});
async function loadConnect(){
    const org =await connect('governance.aragonproject.eth', 'thegraph');
    const apps =await org.apps();

    apps.forEach(console.log)
}
/**
 * below we are going to fetch states for sample addresses
 */
