const volume = (state = 0.5, action) => {
    switch (action.type) {
        case 'SET_VOLUME':
            return action.payload
        default:
            return state
    }
}

export {
    volume
}