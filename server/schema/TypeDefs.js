const { gql } = require('apollo-server-express')

const typeDefs = gql`
    type User {
        name: String!
    }

    # Queries
    type Query {
        getAllUsers: [User!]!
    }
`

module.exports = {typeDefs};