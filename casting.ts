import AragonApp, { providers } from '@aragon/api'

const api = new AragonApp()
//console.log('frrf');
// Sends an intent to the wrapper that we wish to invoke `increment` on our app's smart contract
api
  .increment(1)
  .subscribe(
    txHash => console.log(`Success! Incremented in tx ${txHash}`),
    err => console.log(`Could not increment: ${err}`)
  )