import { Ability } from '@casl/ability';

const roles = JSON.parse(sessionStorage.getItem('ROLES') || '[]')
export default new Ability([
  ...roles

  // or static definition: 
  
  // {
  //   action: 'read',
  //   subject: 'Post'
  // },
  // {
  //   inverted: true,
  //   action: 'delete',
  //   subject: 'Post',
  //   conditions: { published: true }
  // }
])

